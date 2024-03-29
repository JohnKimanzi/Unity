<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class OtherCountriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::upsert(
            [
                ['iso2' => 'AF', 'iso3' => 'AFG', 'num_code' => '4', 'phone_code' => '93', 'name' => 'Afghanistan'],
                ['iso2' => 'AL', 'iso3' => 'ALB', 'num_code' => '8', 'phone_code' => '355', 'name' => 'Albania'],
                ['iso2' => 'DZ', 'iso3' => 'DZA', 'num_code' => '12', 'phone_code' => '213', 'name' => 'Algeria'],
                ['iso2' => 'AS', 'iso3' => 'ASM', 'num_code' => '16', 'phone_code' => '1684', 'name' => 'American Samoa'],
                ['iso2' => 'AD', 'iso3' => 'AND', 'num_code' => '20', 'phone_code' => '376', 'name' => 'Andorra'],
                ['iso2' => 'AO', 'iso3' => 'AGO', 'num_code' => '24', 'phone_code' => '244', 'name' => 'Angola'],
                ['iso2' => 'AI', 'iso3' => 'AIA', 'num_code' => '660', 'phone_code' => '1264', 'name' => 'Anguilla'],
                ['iso2' => 'AQ', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '0', 'name' => 'Antarctica'],
                ['iso2' => 'AG', 'iso3' => 'ATG', 'num_code' => '28', 'phone_code' => '1268', 'name' => 'Antigua and Barbuda'],
                ['iso2' => 'AR', 'iso3' => 'ARG', 'num_code' => '32', 'phone_code' => '54', 'name' => 'Argentina'],
                ['iso2' => 'AM', 'iso3' => 'ARM', 'num_code' => '51', 'phone_code' => '374', 'name' => 'Armenia'],
                ['iso2' => 'AW', 'iso3' => 'ABW', 'num_code' => '533', 'phone_code' => '297', 'name' => 'Aruba'],
                ['iso2' => 'AU', 'iso3' => 'AUS', 'num_code' => '36', 'phone_code' => '61', 'name' => 'Australia'],
                ['iso2' => 'AT', 'iso3' => 'AUT', 'num_code' => '40', 'phone_code' => '43', 'name' => 'Austria'],
                ['iso2' => 'AZ', 'iso3' => 'AZE', 'num_code' => '31', 'phone_code' => '994', 'name' => 'Azerbaijan'],
                ['iso2' => 'BS', 'iso3' => 'BHS', 'num_code' => '44', 'phone_code' => '1242', 'name' => 'Bahamas'],
                ['iso2' => 'BH', 'iso3' => 'BHR', 'num_code' => '48', 'phone_code' => '973', 'name' => 'Bahrain'],
                ['iso2' => 'BD', 'iso3' => 'BGD', 'num_code' => '50', 'phone_code' => '880', 'name' => 'Bangladesh'],
                ['iso2' => 'BB', 'iso3' => 'BRB', 'num_code' => '52', 'phone_code' => '1246', 'name' => 'Barbados'],
                ['iso2' => 'BY', 'iso3' => 'BLR', 'num_code' => '112', 'phone_code' => '375', 'name' => 'Belarus'],
                ['iso2' => 'BE', 'iso3' => 'BEL', 'num_code' => '56', 'phone_code' => '32', 'name' => 'Belgium'],
                ['iso2' => 'BZ', 'iso3' => 'BLZ', 'num_code' => '84', 'phone_code' => '501', 'name' => 'Belize'],
                ['iso2' => 'BJ', 'iso3' => 'BEN', 'num_code' => '204', 'phone_code' => '229', 'name' => 'Benin'],
                ['iso2' => 'BM', 'iso3' => 'BMU', 'num_code' => '60', 'phone_code' => '1441', 'name' => 'Bermuda'],
                ['iso2' => 'BT', 'iso3' => 'BTN', 'num_code' => '64', 'phone_code' => '975', 'name' => 'Bhutan'],
                ['iso2' => 'BO', 'iso3' => 'BOL', 'num_code' => '68', 'phone_code' => '591', 'name' => 'Bolivia'],
                ['iso2' => 'BA', 'iso3' => 'BIH', 'num_code' => '70', 'phone_code' => '387', 'name' => 'Bosnia and Herzegovina'],
                ['iso2' => 'BW', 'iso3' => 'BWA', 'num_code' => '72', 'phone_code' => '267', 'name' => 'Botswana'],
                ['iso2' => 'BV', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '0', 'name' => 'Bouvet Island'],
                ['iso2' => 'BR', 'iso3' => 'BRA', 'num_code' => '76', 'phone_code' => '55', 'name' => 'Brazil'],
                ['iso2' => 'IO', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '246', 'name' => 'British Indian Ocean Territory'],
                ['iso2' => 'BN', 'iso3' => 'BRN', 'num_code' => '96', 'phone_code' => '673', 'name' => 'Brunei Darussalam'],
                ['iso2' => 'BG', 'iso3' => 'BGR', 'num_code' => '100', 'phone_code' => '359', 'name' => 'Bulgaria'],
                ['iso2' => 'BF', 'iso3' => 'BFA', 'num_code' => '854', 'phone_code' => '226', 'name' => 'Burkina Faso'],
                ['iso2' => 'BI', 'iso3' => 'BDI', 'num_code' => '108', 'phone_code' => '257', 'name' => 'Burundi'],
                ['iso2' => 'KH', 'iso3' => 'KHM', 'num_code' => '116', 'phone_code' => '855', 'name' => 'Cambodia'],
                ['iso2' => 'CM', 'iso3' => 'CMR', 'num_code' => '120', 'phone_code' => '237', 'name' => 'Cameroon'],
                ['iso2' => 'CA', 'iso3' => 'CAN', 'num_code' => '124', 'phone_code' => '1', 'name' => 'Canada'],
                ['iso2' => 'CV', 'iso3' => 'CPV', 'num_code' => '132', 'phone_code' => '238', 'name' => 'Cape Verde'],
                ['iso2' => 'KY', 'iso3' => 'CYM', 'num_code' => '136', 'phone_code' => '1345', 'name' => 'Cayman Islands'],
                ['iso2' => 'CF', 'iso3' => 'CAF', 'num_code' => '140', 'phone_code' => '236', 'name' => 'Central African Republic'],
                ['iso2' => 'TD', 'iso3' => 'TCD', 'num_code' => '148', 'phone_code' => '235', 'name' => 'Chad'],
                ['iso2' => 'CL', 'iso3' => 'CHL', 'num_code' => '152', 'phone_code' => '56', 'name' => 'Chile'],
                ['iso2' => 'CN', 'iso3' => 'CHN', 'num_code' => '156', 'phone_code' => '86', 'name' => 'China'],
                ['iso2' => 'CX', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '61', 'name' => 'Christmas Island'],
                ['iso2' => 'CC', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '672', 'name' => 'Cocos (Keeling) Islands'],
                ['iso2' => 'CO', 'iso3' => 'COL', 'num_code' => '170', 'phone_code' => '57', 'name' => 'Colombia'],
                ['iso2' => 'KM', 'iso3' => 'COM', 'num_code' => '174', 'phone_code' => '269', 'name' => 'Comoros'],
                ['iso2' => 'CG', 'iso3' => 'COG', 'num_code' => '178', 'phone_code' => '242', 'name' => 'Congo'],
                ['iso2' => 'CD', 'iso3' => 'COD', 'num_code' => '180', 'phone_code' => '242', 'name' => 'Congo, the Democratic Republic of the'],
                ['iso2' => 'CK', 'iso3' => 'COK', 'num_code' => '184', 'phone_code' => '682', 'name' => 'Cook Islands'],
                ['iso2' => 'CR', 'iso3' => 'CRI', 'num_code' => '188', 'phone_code' => '506', 'name' => 'Costa Rica'],
                ['iso2' => 'CI', 'iso3' => 'CIV', 'num_code' => '384', 'phone_code' => '225', 'name' => 'Cote D Ivoire'],
                ['iso2' => 'HR', 'iso3' => 'HRV', 'num_code' => '191', 'phone_code' => '385', 'name' => 'Croatia'],
                ['iso2' => 'CU', 'iso3' => 'CUB', 'num_code' => '192', 'phone_code' => '53', 'name' => 'Cuba'],
                ['iso2' => 'CY', 'iso3' => 'CYP', 'num_code' => '196', 'phone_code' => '357', 'name' => 'Cyprus'],
                ['iso2' => 'CZ', 'iso3' => 'CZE', 'num_code' => '203', 'phone_code' => '420', 'name' => 'Czech Republic'],
                ['iso2' => 'DK', 'iso3' => 'DNK', 'num_code' => '208', 'phone_code' => '45', 'name' => 'Denmark'],
                ['iso2' => 'DJ', 'iso3' => 'DJI', 'num_code' => '262', 'phone_code' => '253', 'name' => 'Djibouti'],
                ['iso2' => 'DM', 'iso3' => 'DMA', 'num_code' => '212', 'phone_code' => '1767', 'name' => 'Dominica'],
                ['iso2' => 'DO', 'iso3' => 'DOM', 'num_code' => '214', 'phone_code' => '1809', 'name' => 'Dominican Republic'],
                ['iso2' => 'EC', 'iso3' => 'ECU', 'num_code' => '218', 'phone_code' => '593', 'name' => 'Ecuador'],
                ['iso2' => 'EG', 'iso3' => 'EGY', 'num_code' => '818', 'phone_code' => '20', 'name' => 'Egypt'],
                ['iso2' => 'SV', 'iso3' => 'SLV', 'num_code' => '222', 'phone_code' => '503', 'name' => 'El Salvador'],
                ['iso2' => 'GQ', 'iso3' => 'GNQ', 'num_code' => '226', 'phone_code' => '240', 'name' => 'Equatorial Guinea'],
                ['iso2' => 'ER', 'iso3' => 'ERI', 'num_code' => '232', 'phone_code' => '291', 'name' => 'Eritrea'],
                ['iso2' => 'EE', 'iso3' => 'EST', 'num_code' => '233', 'phone_code' => '372', 'name' => 'Estonia'],
                ['iso2' => 'ET', 'iso3' => 'ETH', 'num_code' => '231', 'phone_code' => '251', 'name' => 'Ethiopia'],
                ['iso2' => 'FK', 'iso3' => 'FLK', 'num_code' => '238', 'phone_code' => '500', 'name' => 'Falkland Islands (Malvinas)'],
                ['iso2' => 'FO', 'iso3' => 'FRO', 'num_code' => '234', 'phone_code' => '298', 'name' => 'Faroe Islands'],
                ['iso2' => 'FJ', 'iso3' => 'FJI', 'num_code' => '242', 'phone_code' => '679', 'name' => 'Fiji'],
                ['iso2' => 'FI', 'iso3' => 'FIN', 'num_code' => '246', 'phone_code' => '358', 'name' => 'Finland'],
                ['iso2' => 'FR', 'iso3' => 'FRA', 'num_code' => '250', 'phone_code' => '33', 'name' => 'France'],
                ['iso2' => 'GF', 'iso3' => 'GUF', 'num_code' => '254', 'phone_code' => '594', 'name' => 'French Guiana'],
                ['iso2' => 'PF', 'iso3' => 'PYF', 'num_code' => '258', 'phone_code' => '689', 'name' => 'French Polynesia'],
                ['iso2' => 'TF', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '0', 'name' => 'French Southern Territories'],
                ['iso2' => 'GA', 'iso3' => 'GAB', 'num_code' => '266', 'phone_code' => '241', 'name' => 'Gabon'],
                ['iso2' => 'GM', 'iso3' => 'GMB', 'num_code' => '270', 'phone_code' => '220', 'name' => 'Gambia'],
                ['iso2' => 'GE', 'iso3' => 'GEO', 'num_code' => '268', 'phone_code' => '995', 'name' => 'Georgia'],
                ['iso2' => 'DE', 'iso3' => 'DEU', 'num_code' => '276', 'phone_code' => '49', 'name' => 'Germany'],
                ['iso2' => 'GH', 'iso3' => 'GHA', 'num_code' => '288', 'phone_code' => '233', 'name' => 'Ghana'],
                ['iso2' => 'GI', 'iso3' => 'GIB', 'num_code' => '292', 'phone_code' => '350', 'name' => 'Gibraltar'],
                ['iso2' => 'GR', 'iso3' => 'GRC', 'num_code' => '300', 'phone_code' => '30', 'name' => 'Greece'],
                ['iso2' => 'GL', 'iso3' => 'GRL', 'num_code' => '304', 'phone_code' => '299', 'name' => 'Greenland'],
                ['iso2' => 'GD', 'iso3' => 'GRD', 'num_code' => '308', 'phone_code' => '1473', 'name' => 'Grenada'],
                ['iso2' => 'GP', 'iso3' => 'GLP', 'num_code' => '312', 'phone_code' => '590', 'name' => 'Guadeloupe'],
                ['iso2' => 'GU', 'iso3' => 'GUM', 'num_code' => '316', 'phone_code' => '1671', 'name' => 'Guam'],
                ['iso2' => 'GT', 'iso3' => 'GTM', 'num_code' => '320', 'phone_code' => '502', 'name' => 'Guatemala'],
                ['iso2' => 'GN', 'iso3' => 'GIN', 'num_code' => '324', 'phone_code' => '224', 'name' => 'Guinea'],
                ['iso2' => 'GW', 'iso3' => 'GNB', 'num_code' => '624', 'phone_code' => '245', 'name' => 'Guinea-Bissau'],
                ['iso2' => 'GY', 'iso3' => 'GUY', 'num_code' => '328', 'phone_code' => '592', 'name' => 'Guyana'],
                ['iso2' => 'HT', 'iso3' => 'HTI', 'num_code' => '332', 'phone_code' => '509', 'name' => 'Haiti'],
                ['iso2' => 'HM', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '0', 'name' => 'Heard Island and Mcdonald Islands'],
                ['iso2' => 'VA', 'iso3' => 'VAT', 'num_code' => '336', 'phone_code' => '39', 'name' => 'Holy See (Vatican City State)'],
                ['iso2' => 'HN', 'iso3' => 'HND', 'num_code' => '340', 'phone_code' => '504', 'name' => 'Honduras'],
                ['iso2' => 'HK', 'iso3' => 'HKG', 'num_code' => '344', 'phone_code' => '852', 'name' => 'Hong Kong'],
                ['iso2' => 'HU', 'iso3' => 'HUN', 'num_code' => '348', 'phone_code' => '36', 'name' => 'Hungary'],
                ['iso2' => 'IS', 'iso3' => 'ISL', 'num_code' => '352', 'phone_code' => '354', 'name' => 'Iceland'],
                ['iso2' => 'IN', 'iso3' => 'IND', 'num_code' => '356', 'phone_code' => '91', 'name' => 'India'],
                ['iso2' => 'ID', 'iso3' => 'IDN', 'num_code' => '360', 'phone_code' => '62', 'name' => 'Indonesia'],
                ['iso2' => 'IR', 'iso3' => 'IRN', 'num_code' => '364', 'phone_code' => '98', 'name' => 'Iran, Islamic Republic of'],
                ['iso2' => 'IQ', 'iso3' => 'IRQ', 'num_code' => '368', 'phone_code' => '964', 'name' => 'Iraq'],
                ['iso2' => 'IE', 'iso3' => 'IRL', 'num_code' => '372', 'phone_code' => '353', 'name' => 'Ireland'],
                ['iso2' => 'IL', 'iso3' => 'ISR', 'num_code' => '376', 'phone_code' => '972', 'name' => 'Israel'],
                ['iso2' => 'IT', 'iso3' => 'ITA', 'num_code' => '380', 'phone_code' => '39', 'name' => 'Italy'],
                ['iso2' => 'JM', 'iso3' => 'JAM', 'num_code' => '388', 'phone_code' => '1876', 'name' => 'Jamaica'],
                ['iso2' => 'JP', 'iso3' => 'JPN', 'num_code' => '392', 'phone_code' => '81', 'name' => 'Japan'],
                ['iso2' => 'JO', 'iso3' => 'JOR', 'num_code' => '400', 'phone_code' => '962', 'name' => 'Jordan'],
                ['iso2' => 'KZ', 'iso3' => 'KAZ', 'num_code' => '398', 'phone_code' => '7', 'name' => 'Kazakhstan'],
                ['iso2' => 'KE', 'iso3' => 'KEN', 'num_code' => '404', 'phone_code' => '254', 'name' => 'Kenya'],
                ['iso2' => 'KI', 'iso3' => 'KIR', 'num_code' => '296', 'phone_code' => '686', 'name' => 'Kiribati'],
                ['iso2' => 'KP', 'iso3' => 'PRK', 'num_code' => '408', 'phone_code' => '850', 'name' => 'Korea, Democratic People Republic of'],
                ['iso2' => 'KR', 'iso3' => 'KOR', 'num_code' => '410', 'phone_code' => '82', 'name' => 'Korea, Republic of'],
                ['iso2' => 'KW', 'iso3' => 'KWT', 'num_code' => '414', 'phone_code' => '965', 'name' => 'Kuwait'],
                ['iso2' => 'KG', 'iso3' => 'KGZ', 'num_code' => '417', 'phone_code' => '996', 'name' => 'Kyrgyzstan'],
                ['iso2' => 'LA', 'iso3' => 'LAO', 'num_code' => '418', 'phone_code' => '856', 'name' => 'Lao People Democratic Republic'],
                ['iso2' => 'LV', 'iso3' => 'LVA', 'num_code' => '428', 'phone_code' => '371', 'name' => 'Latvia'],
                ['iso2' => 'LB', 'iso3' => 'LBN', 'num_code' => '422', 'phone_code' => '961', 'name' => 'Lebanon'],
                ['iso2' => 'LS', 'iso3' => 'LSO', 'num_code' => '426', 'phone_code' => '266', 'name' => 'Lesotho'],
                ['iso2' => 'LR', 'iso3' => 'LBR', 'num_code' => '430', 'phone_code' => '231', 'name' => 'Liberia'],
                ['iso2' => 'LY', 'iso3' => 'LBY', 'num_code' => '434', 'phone_code' => '218', 'name' => 'Libyan Arab Jamahiriya'],
                ['iso2' => 'LI', 'iso3' => 'LIE', 'num_code' => '438', 'phone_code' => '423', 'name' => 'Liechtenstein'],
                ['iso2' => 'LT', 'iso3' => 'LTU', 'num_code' => '440', 'phone_code' => '370', 'name' => 'Lithuania'],
                ['iso2' => 'LU', 'iso3' => 'LUX', 'num_code' => '442', 'phone_code' => '352', 'name' => 'Luxembourg'],
                ['iso2' => 'MO', 'iso3' => 'MAC', 'num_code' => '446', 'phone_code' => '853', 'name' => 'Macao'],
                ['iso2' => 'MK', 'iso3' => 'MKD', 'num_code' => '807', 'phone_code' => '389', 'name' => 'Macedonia, the Former Yugoslav Republic of'],
                ['iso2' => 'MG', 'iso3' => 'MDG', 'num_code' => '450', 'phone_code' => '261', 'name' => 'Madagascar'],
                ['iso2' => 'MW', 'iso3' => 'MWI', 'num_code' => '454', 'phone_code' => '265', 'name' => 'Malawi'],
                ['iso2' => 'MY', 'iso3' => 'MYS', 'num_code' => '458', 'phone_code' => '60', 'name' => 'Malaysia'],
                ['iso2' => 'MV', 'iso3' => 'MDV', 'num_code' => '462', 'phone_code' => '960', 'name' => 'Maldives'],
                ['iso2' => 'ML', 'iso3' => 'MLI', 'num_code' => '466', 'phone_code' => '223', 'name' => 'Mali'],
                ['iso2' => 'MT', 'iso3' => 'MLT', 'num_code' => '470', 'phone_code' => '356', 'name' => 'Malta'],
                ['iso2' => 'MH', 'iso3' => 'MHL', 'num_code' => '584', 'phone_code' => '692', 'name' => 'Marshall Islands'],
                ['iso2' => 'MQ', 'iso3' => 'MTQ', 'num_code' => '474', 'phone_code' => '596', 'name' => 'Martinique'],
                ['iso2' => 'MR', 'iso3' => 'MRT', 'num_code' => '478', 'phone_code' => '222', 'name' => 'Mauritania'],
                ['iso2' => 'MU', 'iso3' => 'MUS', 'num_code' => '480', 'phone_code' => '230', 'name' => 'Mauritius'],
                ['iso2' => 'YT', 'iso3' =>  NULL, 'num_code' => NULL,  'phone_code' => '269', 'name' => 'Mayotte'],
                ['iso2' => 'MX', 'iso3' => 'MEX', 'num_code' => '484', 'phone_code' => '52', 'name' => 'Mexico'],
                ['iso2' => 'FM', 'iso3' => 'FSM', 'num_code' => '583', 'phone_code' => '691', 'name' => 'Micronesia, Federated States of'],
                ['iso2' => 'MD', 'iso3' => 'MDA', 'num_code' => '498', 'phone_code' => '373', 'name' => 'Moldova, Republic of'],
                ['iso2' => 'MC', 'iso3' => 'MCO', 'num_code' => '492', 'phone_code' => '377', 'name' => 'Monaco'],
                ['iso2' => 'MN', 'iso3' => 'MNG', 'num_code' => '496', 'phone_code' => '976', 'name' => 'Mongolia'],
                ['iso2' => 'MS', 'iso3' => 'MSR', 'num_code' => '500', 'phone_code' => '1664', 'name' => 'Montserrat'],
                ['iso2' => 'MA', 'iso3' => 'MAR', 'num_code' => '504', 'phone_code' => '212', 'name' => 'Morocco'],
                ['iso2' => 'MZ', 'iso3' => 'MOZ', 'num_code' => '508', 'phone_code' => '258', 'name' => 'Mozambique'],
                ['iso2' => 'MM', 'iso3' => 'MMR', 'num_code' => '104', 'phone_code' => '95', 'name' => 'Myanmar'],
                ['iso2' => 'NA', 'iso3' => 'NAM', 'num_code' => '516', 'phone_code' => '264', 'name' => 'Namibia'],
                ['iso2' => 'NR', 'iso3' => 'NRU', 'num_code' => '520', 'phone_code' => '674', 'name' => 'Nauru'],
                ['iso2' => 'NP', 'iso3' => 'NPL', 'num_code' => '524', 'phone_code' => '977', 'name' => 'Nepal'],
                ['iso2' => 'NL', 'iso3' => 'NLD', 'num_code' => '528', 'phone_code' => '31', 'name' => 'Netherlands'],
                ['iso2' => 'AN', 'iso3' => 'ANT', 'num_code' => '530', 'phone_code' => '599', 'name' => 'Netherlands Antilles'],
                ['iso2' => 'NC', 'iso3' => 'NCL', 'num_code' => '540', 'phone_code' => '687', 'name' => 'New Caledonia'],
                ['iso2' => 'NZ', 'iso3' => 'NZL', 'num_code' => '554', 'phone_code' => '64', 'name' => 'New Zealand'],
                ['iso2' => 'NI', 'iso3' => 'NIC', 'num_code' => '558', 'phone_code' => '505', 'name' => 'Nicaragua'],
                ['iso2' => 'NE', 'iso3' => 'NER', 'num_code' => '562', 'phone_code' => '227', 'name' => 'Niger'],
                ['iso2' => 'NG', 'iso3' => 'NGA', 'num_code' => '566', 'phone_code' => '234', 'name' => 'Nigeria'],
                ['iso2' => 'NU', 'iso3' => 'NIU', 'num_code' => '570', 'phone_code' => '683', 'name' => 'Niue'],
                ['iso2' => 'NF', 'iso3' => 'NFK', 'num_code' => '574', 'phone_code' => '672', 'name' => 'Norfolk Island'],
                ['iso2' => 'MP', 'iso3' => 'MNP', 'num_code' => '580', 'phone_code' => '1670', 'name' => 'Northern Mariana Islands'],
                ['iso2' => 'NO', 'iso3' => 'NOR', 'num_code' => '578', 'phone_code' => '47', 'name' => 'Norway'],
                ['iso2' => 'OM', 'iso3' => 'OMN', 'num_code' => '512', 'phone_code' => '968', 'name' => 'Oman'],
                ['iso2' => 'PK', 'iso3' => 'PAK', 'num_code' => '586', 'phone_code' => '92', 'name' => 'Pakistan'],
                ['iso2' => 'PW', 'iso3' => 'PLW', 'num_code' => '585', 'phone_code' => '680', 'name' => 'Palau'],
                ['iso2' => 'PS', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '970', 'name' => 'Palestinian Territory, Occupied'],
                ['iso2' => 'PA', 'iso3' => 'PAN', 'num_code' => '591', 'phone_code' => '507', 'name' => 'Panama'],
                ['iso2' => 'PG', 'iso3' => 'PNG', 'num_code' => '598', 'phone_code' => '675', 'name' => 'Papua New Guinea'],
                ['iso2' => 'PY', 'iso3' => 'PRY', 'num_code' => '600', 'phone_code' => '595', 'name' => 'Paraguay'],
                ['iso2' => 'PE', 'iso3' => 'PER', 'num_code' => '604', 'phone_code' => '51', 'name' => 'Peru'],
                ['iso2' => 'PH', 'iso3' => 'PHL', 'num_code' => '608', 'phone_code' => '63', 'name' => 'Philippines'],
                ['iso2' => 'PN', 'iso3' => 'PCN', 'num_code' => '612', 'phone_code' => '0', 'name' => 'Pitcairn'],
                ['iso2' => 'PL', 'iso3' => 'POL', 'num_code' => '616', 'phone_code' => '48', 'name' => 'Poland'],
                ['iso2' => 'PT', 'iso3' => 'PRT', 'num_code' => '620', 'phone_code' => '351', 'name' => 'Portugal'],
                ['iso2' => 'PR', 'iso3' => 'PRI', 'num_code' => '630', 'phone_code' => '1787', 'name' => 'Puerto Rico'],
                ['iso2' => 'QA', 'iso3' => 'QAT', 'num_code' => '634', 'phone_code' => '974', 'name' => 'Qatar'],
                ['iso2' => 'RE', 'iso3' => 'REU', 'num_code' => '638', 'phone_code' => '262', 'name' => 'Reunion'],
                ['iso2' => 'RO', 'iso3' => 'ROM', 'num_code' => '642', 'phone_code' => '40', 'name' => 'Romania'],
                ['iso2' => 'RU', 'iso3' => 'RUS', 'num_code' => '643', 'phone_code' => '70', 'name' => 'Russian Federation'],
                ['iso2' => 'RW', 'iso3' => 'RWA', 'num_code' => '646', 'phone_code' => '250', 'name' => 'Rwanda'],
                ['iso2' => 'SH', 'iso3' => 'SHN', 'num_code' => '654', 'phone_code' => '290', 'name' => 'Saint Helena'],
                ['iso2' => 'KN', 'iso3' => 'KNA', 'num_code' => '659', 'phone_code' => '1869', 'name' => 'Saint Kitts and Nevis'],
                ['iso2' => 'LC', 'iso3' => 'LCA', 'num_code' => '662', 'phone_code' => '1758', 'name' => 'Saint Lucia'],
                ['iso2' => 'PM', 'iso3' => 'SPM', 'num_code' => '666', 'phone_code' => '508', 'name' => 'Saint Pierre and Miquelon'],
                ['iso2' => 'VC', 'iso3' => 'VCT', 'num_code' => '670', 'phone_code' => '1784', 'name' => 'Saint Vincent and the Grenadines'],
                ['iso2' => 'WS', 'iso3' => 'WSM', 'num_code' => '882', 'phone_code' => '684', 'name' => 'Samoa'],
                ['iso2' => 'SM', 'iso3' => 'SMR', 'num_code' => '674', 'phone_code' => '378', 'name' => 'San Marino'],
                ['iso2' => 'ST', 'iso3' => 'STP', 'num_code' => '678', 'phone_code' => '239', 'name' => 'Sao Tome and Principe'],
                ['iso2' => 'SA', 'iso3' => 'SAU', 'num_code' => '682', 'phone_code' => '966', 'name' => 'Saudi Arabia'],
                ['iso2' => 'SN', 'iso3' => 'SEN', 'num_code' => '686', 'phone_code' => '221', 'name' => 'Senegal'],
                ['iso2' => 'CS', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '381', 'name' => 'Serbia and Montenegro'],
                ['iso2' => 'SC', 'iso3' => 'SYC', 'num_code' => '690', 'phone_code' => '248', 'name' => 'Seychelles'],
                ['iso2' => 'SL', 'iso3' => 'SLE', 'num_code' => '694', 'phone_code' => '232', 'name' => 'Sierra Leone'],
                ['iso2' => 'SG', 'iso3' => 'SGP', 'num_code' => '702', 'phone_code' => '65', 'name' => 'Singapore'],
                ['iso2' => 'SK', 'iso3' => 'SVK', 'num_code' => '703', 'phone_code' => '421', 'name' => 'Slovakia'],
                ['iso2' => 'SI', 'iso3' => 'SVN', 'num_code' => '705', 'phone_code' => '386', 'name' => 'Slovenia'],
                ['iso2' => 'SB', 'iso3' => 'SLB', 'num_code' => '90', 'phone_code' => '677', 'name' => 'Solomon Islands'],
                ['iso2' => 'SO', 'iso3' => 'SOM', 'num_code' => '706', 'phone_code' => '252', 'name' => 'Somalia'],
                ['iso2' => 'ZA', 'iso3' => 'ZAF', 'num_code' => '710', 'phone_code' => '27', 'name' => 'South Africa'],
                ['iso2' => 'GS', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '0', 'name' => 'South Georgia and the South Sandwich Islands'],
                ['iso2' => 'ES', 'iso3' => 'ESP', 'num_code' => '724', 'phone_code' => '34', 'name' => 'Spain'],
                ['iso2' => 'LK', 'iso3' => 'LKA', 'num_code' => '144', 'phone_code' => '94', 'name' => 'Sri Lanka'],
                ['iso2' => 'SD', 'iso3' => 'SDN', 'num_code' => '736', 'phone_code' => '249', 'name' => 'Sudan'],
                ['iso2' => 'SR', 'iso3' => 'SUR', 'num_code' => '740', 'phone_code' => '597', 'name' => 'Suriname'],
                ['iso2' => 'SJ', 'iso3' => 'SJM', 'num_code' => '744', 'phone_code' => '47', 'name' => 'Svalbard and Jan Mayen'],
                ['iso2' => 'SZ', 'iso3' => 'SWZ', 'num_code' => '748', 'phone_code' => '268', 'name' => 'Swaziland'],
                ['iso2' => 'SE', 'iso3' => 'SWE', 'num_code' => '752', 'phone_code' => '46', 'name' => 'Sweden'],
                ['iso2' => 'CH', 'iso3' => 'CHE', 'num_code' => '756', 'phone_code' => '41', 'name' => 'Switzerland'],
                ['iso2' => 'SY', 'iso3' => 'SYR', 'num_code' => '760', 'phone_code' => '963', 'name' => 'Syrian Arab Republic'],
                ['iso2' => 'TW', 'iso3' => 'TWN', 'num_code' => '158', 'phone_code' => '886', 'name' => 'Taiwan, Province of China'],
                ['iso2' => 'TJ', 'iso3' => 'TJK', 'num_code' => '762', 'phone_code' => '992', 'name' => 'Tajikistan'],
                ['iso2' => 'TZ', 'iso3' => 'TZA', 'num_code' => '834', 'phone_code' => '255', 'name' => 'United Republic of Tanzania, '],
                ['iso2' => 'TH', 'iso3' => 'THA', 'num_code' => '764', 'phone_code' => '66', 'name' => 'Thailand'],
                ['iso2' => 'TL', 'iso3' =>  NULL, 'num_code' => NULL, 'phone_code' => '670', 'name' => 'Timor-Leste'],
                ['iso2' => 'TG', 'iso3' => 'TGO', 'num_code' => '768', 'phone_code' => '228', 'name' => 'Togo'],
                ['iso2' => 'TK', 'iso3' => 'TKL', 'num_code' => '772', 'phone_code' => '690', 'name' => 'Tokelau'],
                ['iso2' => 'TO', 'iso3' => 'TON', 'num_code' => '776', 'phone_code' => '676', 'name' => 'Tonga'],
                ['iso2' => 'TT', 'iso3' => 'TTO', 'num_code' => '780', 'phone_code' => '1868', 'name' => 'Trinidad and Tobago'],
                ['iso2' => 'TN', 'iso3' => 'TUN', 'num_code' => '788', 'phone_code' => '216', 'name' => 'Tunisia'],
                ['iso2' => 'TR', 'iso3' => 'TUR', 'num_code' => '792', 'phone_code' => '90', 'name' => 'Turkey'],
                ['iso2' => 'TM', 'iso3' => 'TKM', 'num_code' => '795', 'phone_code' => '7370', 'name' => 'Turkmenistan'],
                ['iso2' => 'TC', 'iso3' => 'TCA', 'num_code' => '796', 'phone_code' => '1649', 'name' => 'Turks and Caicos Islands'],
                ['iso2' => 'TV', 'iso3' => 'TUV', 'num_code' => '798', 'phone_code' => '688', 'name' => 'Tuvalu'],
                ['iso2' => 'UG', 'iso3' => 'UGA', 'num_code' => '800', 'phone_code' => '256', 'name' => 'Uganda'],
                ['iso2' => 'UA', 'iso3' => 'UKR', 'num_code' => '804', 'phone_code' => '380', 'name' => 'Ukraine'],
                ['iso2' => 'AE', 'iso3' => 'ARE', 'num_code' => '784', 'phone_code' => '971', 'name' => 'United Arab Emirates'],
                ['iso2' => 'GB', 'iso3' => 'GBR', 'num_code' => '826', 'phone_code' => '44', 'name' => 'United Kingdom'],
                ['iso2' => 'US', 'iso3' => 'USA', 'num_code' => '840', 'phone_code' => '1', 'name' => 'United States'],
                ['iso2' => 'UM',' iso3' =>  NULL, 'num_code' =>  NULL, 'phone_code' => '1', 'name' => 'United States Minor Outlying Islands'],
                ['iso2' => 'UY', 'iso3' => 'URY', 'num_code' => '858', 'phone_code' => '598', 'name' => 'Uruguay'],
                ['iso2' => 'UZ', 'iso3' => 'UZB', 'num_code' => '860', 'phone_code' => '998', 'name' => 'Uzbekistan'],
                ['iso2' => 'VU', 'iso3' => 'VUT', 'num_code' => '548', 'phone_code' => '678', 'name' => 'Vanuatu'],
                ['iso2' => 'VE', 'iso3' => 'VEN', 'num_code' => '862', 'phone_code' => '58', 'name' => 'Venezuela'],
                ['iso2' => 'VN', 'iso3' => 'VNM', 'num_code' => '704', 'phone_code' => '84', 'name' => 'Viet Nam'],
                ['iso2' => 'VG', 'iso3' => 'VGB', 'num_code' => '92', 'phone_code' => '1284', 'name' => 'Virgin Islands, British'],
                ['iso2' => 'VI', 'iso3' => 'VIR', 'num_code' => '850', 'phone_code' => '1340', 'name' => 'Virgin Islands, U.s.'],
                ['iso2' => 'WF', 'iso3' => 'WLF', 'num_code' => '876', 'phone_code' => '681', 'name' => 'Wallis and Futuna'],
                ['iso2' => 'EH', 'iso3' => 'ESH', 'num_code' => '732', 'phone_code' => '212', 'name' => 'Western Sahara'],
                ['iso2' => 'YE', 'iso3' => 'YEM', 'num_code' => '887', 'phone_code' => '967', 'name' => 'Yemen'],
                ['iso2' => 'ZM', 'iso3' => 'ZMB', 'num_code' => '894', 'phone_code' => '260', 'name' => 'Zambia'],
                ['iso2' => 'ZW', 'iso3' => 'ZWE', 'num_code' => '716', 'phone_code' => '263', 'name' => 'Zimbabwe']
            
            ], ['iso2'], ['name', 'iso3', 'phone_code', 'num_code']);
    }
}
