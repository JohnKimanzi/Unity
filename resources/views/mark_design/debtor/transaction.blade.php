<div class="col-md-12" id="debt_transaction" style="display:none;">
    <div class="row">
        <p>Transaction Summary as of <input type="date"><button class="btn btn-custom btn-sm">Re Calculate</button></p>
    </div>
  
        <form>
            <p>Add New Transaction</p>
            <div class="row">
                <div class="form-group-sm mb-2">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" >
                </div>
                <div class="form-group-sm mb-3">
                    <label>Description</label>
                <select class="form-control" name="desc">
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="credit-card">Payment-Credit Card</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    </select>
                </div>
                <div class="form-group-sm mb-2">
                    <label>Amount</label>
                    <input type="currency" class="form-control" name="date" >
                </div>
            
                <div class="form-group-sm mb-2">
                    <label>Note/Check #</label>
                    <input type="text" class="form-control" name="date" >
                </div>
            </div>
            <div class="row">
                <div class="form-group-smmb-2">
                    <label>Collector</label>
                    <select class="form-control" name="collector">
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="credit-card">Payment-Credit Card</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    </select>
                </div>
                <div class="form-group-sm mb-2">
                    <label>Co Collector</label>
                    <select class="form-control" name="co_collector">
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="credit-card">Payment-Credit Card</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    <option value="bank-levy">Payment-Bank Levy</option>
                    </select>
                </div>
   
            </div>
            <input type="submit" name="submit" value="Insert new Transaction" class="btn btn-custom btn-sm">
        </form>
   
        <div class="row card-body" id="mark_design_table_transaction">
            <table class="table table-bordered table-responsive table-striped custom-data-table" >
                <thead>
                    <tr id="mark_design_table_th"><th>Date</th><th>Description</th><th>Note</th><th>Collector</th><th>Amount</th><th>Principal</th><th>Cost</th><th>Interest</th>
                        <th>Att Fee</th><th>Over Payment</th><th>3rd Party</th><th>Advanced</th><th>Agency</th><th>Client</th><th>Balance</th><th>Action</th></tr>
                </thead>
                <tbody>
                    <tr><td>Date</td><td>Description</td><td>Note</td><td>Collector</td><td>Amount</td><td>Principal</td><td>Cost</td><td>Interest</td>
                        <td>Att Fee</td><td>Over Payment</td><td>3rd Party</td><td>Advanced</td><td>Agency</td><td>Client</td><td>Balance</td><td>Action</td></tr>
                </tbody>
            </table>
           
        </div>
        
</div>
