"use strict";

var _excluded = ["modules"];

function _objectWithoutProperties(source, excluded) { if (source == null) return {}; var target = _objectWithoutPropertiesLoose(source, excluded); var key, i; if (Object.getOwnPropertySymbols) { var sourceSymbolKeys = Object.getOwnPropertySymbols(source); for (i = 0; i < sourceSymbolKeys.length; i++) { key = sourceSymbolKeys[i]; if (excluded.indexOf(key) >= 0) continue; if (!Object.prototype.propertyIsEnumerable.call(source, key)) continue; target[key] = source[key]; } } return target; }

function _objectWithoutPropertiesLoose(source, excluded) { if (source == null) return {}; var target = {}; var sourceKeys = Object.keys(source); var key, i; for (i = 0; i < sourceKeys.length; i++) { key = sourceKeys[i]; if (excluded.indexOf(key) >= 0) continue; target[key] = source[key]; } return target; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var DocUtils = require("./doc-utils.js");

DocUtils.traits = require("./traits.js");
DocUtils.moduleWrapper = require("./module-wrapper.js");

var createScope = require("./scope-manager.js");

var _require = require("./errors.js"),
    throwMultiError = _require.throwMultiError,
    throwResolveBeforeCompile = _require.throwResolveBeforeCompile,
    throwRenderInvalidTemplate = _require.throwRenderInvalidTemplate;

var logErrors = require("./error-logger.js");

var collectContentTypes = require("./collect-content-types.js");

var ctXML = "[Content_Types].xml";

var commonModule = require("./modules/common.js");

var Lexer = require("./lexer.js");

var defaults = DocUtils.defaults,
    str2xml = DocUtils.str2xml,
    xml2str = DocUtils.xml2str,
    moduleWrapper = DocUtils.moduleWrapper,
    concatArrays = DocUtils.concatArrays,
    uniq = DocUtils.uniq;

var _require2 = require("./errors.js"),
    XTInternalError = _require2.XTInternalError,
    throwFileTypeNotIdentified = _require2.throwFileTypeNotIdentified,
    throwFileTypeNotHandled = _require2.throwFileTypeNotHandled,
    throwApiVersionError = _require2.throwApiVersionError;

var currentModuleApiVersion = [3, 27, 0];

var Docxtemplater = /*#__PURE__*/function () {
  function Docxtemplater(zip) {
    var _this = this;

    var _ref = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {},
        _ref$modules = _ref.modules,
        modules = _ref$modules === void 0 ? [] : _ref$modules,
        options = _objectWithoutProperties(_ref, _excluded);

    _classCallCheck(this, Docxtemplater);

    if (!Array.isArray(modules)) {
      throw new Error("The modules argument of docxtemplater's constructor must be an array");
    }

    this.scopeManagers = {};
    this.compiled = {};
    this.modules = [commonModule()];
    this.setOptions(options);
    modules.forEach(function (module) {
      _this.attachModule(module);
    });

    if (arguments.length > 0) {
      if (!zip || !zip.files || typeof zip.file !== "function") {
        throw new Error("The first argument of docxtemplater's constructor must be a valid zip file (jszip v2 or pizzip v3)");
      }

      this.loadZip(zip); // remove the unsupported modules

      this.modules = this.modules.filter(function (module) {
        if (module.supportedFileTypes) {
          if (!Array.isArray(module.supportedFileTypes)) {
            throw new Error("The supportedFileTypes field of the module must be an array");
          }

          var isSupportedModule = module.supportedFileTypes.indexOf(_this.fileType) !== -1;

          if (!isSupportedModule) {
            module.on("detached");
          }

          return isSupportedModule;
        }

        return true;
      });
      this.compile();
      this.v4Constructor = true;
    }
  }

  _createClass(Docxtemplater, [{
    key: "verifyApiVersion",
    value: function verifyApiVersion(neededVersion) {
      neededVersion = neededVersion.split(".").map(function (i) {
        return parseInt(i, 10);
      });

      if (neededVersion.length !== 3) {
        throwApiVersionError("neededVersion is not a valid version", {
          neededVersion: neededVersion,
          explanation: "the neededVersion must be an array of length 3"
        });
      }

      if (neededVersion[0] !== currentModuleApiVersion[0]) {
        throwApiVersionError("The major api version do not match, you probably have to update docxtemplater with npm install --save docxtemplater", {
          neededVersion: neededVersion,
          currentModuleApiVersion: currentModuleApiVersion,
          explanation: "moduleAPIVersionMismatch : needed=".concat(neededVersion.join("."), ", current=").concat(currentModuleApiVersion.join("."))
        });
      }

      if (neededVersion[1] > currentModuleApiVersion[1]) {
        throwApiVersionError("The minor api version is not uptodate, you probably have to update docxtemplater with npm install --save docxtemplater", {
          neededVersion: neededVersion,
          currentModuleApiVersion: currentModuleApiVersion,
          explanation: "moduleAPIVersionMismatch : needed=".concat(neededVersion.join("."), ", current=").concat(currentModuleApiVersion.join("."))
        });
      }

      if (neededVersion[1] === currentModuleApiVersion[1] && neededVersion[2] > currentModuleApiVersion[2]) {
        throwApiVersionError("The patch api version is not uptodate, you probably have to update docxtemplater with npm install --save docxtemplater", {
          neededVersion: neededVersion,
          currentModuleApiVersion: currentModuleApiVersion,
          explanation: "moduleAPIVersionMismatch : needed=".concat(neededVersion.join("."), ", current=").concat(currentModuleApiVersion.join("."))
        });
      }

      return true;
    }
  }, {
    key: "setModules",
    value: function setModules(obj) {
      this.modules.forEach(function (module) {
        module.set(obj);
      });
    }
  }, {
    key: "sendEvent",
    value: function sendEvent(eventName) {
      this.modules.forEach(function (module) {
        module.on(eventName);
      });
    }
  }, {
    key: "attachModule",
    value: function attachModule(module) {
      if (this.v4Constructor) {
        throw new Error("attachModule() should not be called manually when using the v4 constructor");
      }

      if (module.requiredAPIVersion) {
        this.verifyApiVersion(module.requiredAPIVersion);
      }

      if (module.attached === true) {
        throw new Error("Cannot attach a module that was already attached : \"".concat(module.name, "\". Maybe you are instantiating the module at the root level, and using it for multiple instances of Docxtemplater"));
      }

      module.attached = true;

      if (typeof module === "function") {
        throw new Error("Cannot attach a class/function as a module. Most probably you forgot to instantiate the module by using `new` on the module.");
      }

      var wrappedModule = moduleWrapper(module);
      this.modules.push(wrappedModule);
      wrappedModule.on("attached");
      return this;
    }
  }, {
    key: "setOptions",
    value: function setOptions(options) {
      var _this2 = this;

      if (this.v4Constructor) {
        throw new Error("setOptions() should not be called manually when using the v4 constructor");
      }

      if (!options) {
        throw new Error("setOptions should be called with an object as first parameter");
      }

      this.options = {};
      Object.keys(defaults).forEach(function (key) {
        var defaultValue = defaults[key];
        _this2.options[key] = options[key] != null ? options[key] : defaultValue;
        _this2[key] = _this2.options[key];
      });

      if (this.zip) {
        this.updateFileTypeConfig();
      }

      return this;
    }
  }, {
    key: "loadZip",
    value: function loadZip(zip) {
      if (this.v4Constructor) {
        throw new Error("loadZip() should not be called manually when using the v4 constructor");
      }

      if (zip.loadAsync) {
        throw new XTInternalError("Docxtemplater doesn't handle JSZip version >=3, please use pizzip");
      }

      this.zip = zip;
      this.updateFileTypeConfig();
      this.modules = concatArrays([this.fileTypeConfig.baseModules.map(function (moduleFunction) {
        return moduleFunction();
      }), this.modules]);
      return this;
    }
  }, {
    key: "precompileFile",
    value: function precompileFile(fileName) {
      var currentFile = this.createTemplateClass(fileName);
      currentFile.preparse();
      this.compiled[fileName] = currentFile;
    }
  }, {
    key: "compileFile",
    value: function compileFile(fileName) {
      this.compiled[fileName].parse();
    }
  }, {
    key: "getScopeManager",
    value: function getScopeManager(to, currentFile, tags) {
      if (!this.scopeManagers[to]) {
        this.scopeManagers[to] = createScope({
          tags: tags || {},
          parser: this.parser,
          cachedParsers: currentFile.cachedParsers
        });
      }

      return this.scopeManagers[to];
    }
  }, {
    key: "resolveData",
    value: function resolveData(data) {
      var _this3 = this;

      var errors = [];

      if (!Object.keys(this.compiled).length) {
        throwResolveBeforeCompile();
      }

      return Promise.resolve(data).then(function (data) {
        _this3.setData(data);

        _this3.setModules({
          data: _this3.data,
          Lexer: Lexer
        });

        _this3.mapper = _this3.modules.reduce(function (value, module) {
          return module.getRenderedMap(value);
        }, {});
        return Promise.all(Object.keys(_this3.mapper).map(function (to) {
          var _this3$mapper$to = _this3.mapper[to],
              from = _this3$mapper$to.from,
              data = _this3$mapper$to.data;
          return Promise.resolve(data).then(function (data) {
            var currentFile = _this3.compiled[from];
            currentFile.filePath = to;
            currentFile.scopeManager = _this3.getScopeManager(to, currentFile, data);
            return currentFile.resolveTags(data).then(function (result) {
              currentFile.scopeManager.finishedResolving = true;
              return result;
            }, function (errs) {
              errors = errors.concat(errs);
            });
          });
        })).then(function (resolved) {
          if (errors.length !== 0) {
            if (_this3.options.errorLogging) {
              logErrors(errors);
            }

            throwMultiError(errors);
          }

          return concatArrays(resolved);
        });
      });
    }
  }, {
    key: "compile",
    value: function compile() {
      var _this4 = this;

      if (Object.keys(this.compiled).length) {
        return this;
      }

      this.options = this.modules.reduce(function (options, module) {
        return module.optionsTransformer(options, _this4);
      }, this.options);
      this.options.xmlFileNames = uniq(this.options.xmlFileNames);
      this.xmlDocuments = this.options.xmlFileNames.reduce(function (xmlDocuments, fileName) {
        var content = _this4.zip.files[fileName].asText();

        xmlDocuments[fileName] = str2xml(content);
        return xmlDocuments;
      }, {});
      this.setModules({
        zip: this.zip,
        xmlDocuments: this.xmlDocuments
      });
      this.getTemplatedFiles(); // Loop inside all templatedFiles (ie xml files with content).
      // Sometimes they don't exist (footer.xml for example)

      this.templatedFiles.forEach(function (fileName) {
        if (_this4.zip.files[fileName] != null) {
          _this4.precompileFile(fileName);
        }
      });
      this.templatedFiles.forEach(function (fileName) {
        if (_this4.zip.files[fileName] != null) {
          _this4.compileFile(fileName);
        }
      });
      this.setModules({
        compiled: this.compiled
      });
      verifyErrors(this);
      return this;
    }
  }, {
    key: "updateFileTypeConfig",
    value: function updateFileTypeConfig() {
      var _this5 = this;

      var fileType;

      if (this.zip.files.mimetype) {
        fileType = "odt";
      }

      var contentTypes = this.zip.files[ctXML];
      this.targets = [];
      var contentTypeXml = contentTypes ? str2xml(contentTypes.asText()) : null;
      var overrides = contentTypeXml ? contentTypeXml.getElementsByTagName("Override") : null;
      var defaults = contentTypeXml ? contentTypeXml.getElementsByTagName("Default") : null;

      if (contentTypeXml) {
        this.filesContentTypes = collectContentTypes(overrides, defaults, this.zip);
        this.invertedContentTypes = DocUtils.invertMap(this.filesContentTypes);
        this.setModules({
          contentTypes: this.contentTypes,
          invertedContentTypes: this.invertedContentTypes
        });
      }

      this.modules.forEach(function (module) {
        fileType = module.getFileType({
          zip: _this5.zip,
          contentTypes: contentTypes,
          contentTypeXml: contentTypeXml,
          overrides: overrides,
          defaults: defaults,
          doc: _this5
        }) || fileType;
      });

      if (fileType === "odt") {
        throwFileTypeNotHandled(fileType);
      }

      if (!fileType) {
        throwFileTypeNotIdentified();
      }

      this.fileType = fileType;
      this.fileTypeConfig = this.options.fileTypeConfig || this.fileTypeConfig || Docxtemplater.FileTypeConfig[this.fileType]();
      return this;
    }
  }, {
    key: "renderAsync",
    value: function renderAsync(data) {
      var _this6 = this;

      return this.resolveData(data).then(function () {
        return _this6.render();
      });
    }
  }, {
    key: "render",
    value: function render(data) {
      var _this7 = this;

      this.compile();

      if (this.errors.length > 0) {
        throwRenderInvalidTemplate();
      }

      if (data) {
        this.setData(data);
      }

      this.setModules({
        data: this.data,
        Lexer: Lexer
      });
      this.mapper = this.mapper || this.modules.reduce(function (value, module) {
        return module.getRenderedMap(value);
      }, {});
      Object.keys(this.mapper).forEach(function (to) {
        var _this7$mapper$to = _this7.mapper[to],
            from = _this7$mapper$to.from,
            data = _this7$mapper$to.data;
        var currentFile = _this7.compiled[from];
        currentFile.scopeManager = _this7.getScopeManager(to, currentFile, data);
        currentFile.render(to);

        _this7.zip.file(to, currentFile.content, {
          createFolders: true
        });
      });
      verifyErrors(this);
      this.sendEvent("syncing-zip");
      this.syncZip();
      return this;
    }
  }, {
    key: "syncZip",
    value: function syncZip() {
      var _this8 = this;

      Object.keys(this.xmlDocuments).forEach(function (fileName) {
        _this8.zip.remove(fileName);

        var content = xml2str(_this8.xmlDocuments[fileName]);
        return _this8.zip.file(fileName, content, {
          createFolders: true
        });
      });
    }
  }, {
    key: "setData",
    value: function setData(data) {
      this.data = data;
      return this;
    }
  }, {
    key: "getZip",
    value: function getZip() {
      return this.zip;
    }
  }, {
    key: "createTemplateClass",
    value: function createTemplateClass(path) {
      var content = this.zip.files[path].asText();
      return this.createTemplateClassFromContent(content, path);
    }
  }, {
    key: "createTemplateClassFromContent",
    value: function createTemplateClassFromContent(content, filePath) {
      var _this9 = this;

      var xmltOptions = {
        filePath: filePath,
        contentType: this.filesContentTypes[filePath]
      };
      Object.keys(defaults).concat(["filesContentTypes", "fileTypeConfig", "modules"]).forEach(function (key) {
        xmltOptions[key] = _this9[key];
      });
      return new Docxtemplater.XmlTemplater(content, xmltOptions);
    }
  }, {
    key: "getFullText",
    value: function getFullText(path) {
      return this.createTemplateClass(path || this.fileTypeConfig.textPath(this)).getFullText();
    }
  }, {
    key: "getTemplatedFiles",
    value: function getTemplatedFiles() {
      var _this10 = this;

      this.templatedFiles = this.fileTypeConfig.getTemplatedFiles(this.zip);
      this.targets.forEach(function (target) {
        _this10.templatedFiles.push(target);
      });
      return this.templatedFiles;
    }
  }]);

  return Docxtemplater;
}();

function verifyErrors(doc) {
  var compiled = doc.compiled;
  var allErrors = [];
  Object.keys(compiled).forEach(function (name) {
    var templatePart = compiled[name];
    allErrors = concatArrays([allErrors, templatePart.allErrors]);
  });
  doc.errors = allErrors;

  if (allErrors.length !== 0) {
    if (doc.options.errorLogging) {
      logErrors(allErrors);
    }

    throwMultiError(allErrors);
  }
}

Docxtemplater.DocUtils = DocUtils;
Docxtemplater.Errors = require("./errors.js");
Docxtemplater.XmlTemplater = require("./xml-templater.js");
Docxtemplater.FileTypeConfig = require("./file-type-config.js");
Docxtemplater.XmlMatcher = require("./xml-matcher.js");
module.exports = Docxtemplater;