var EstateProfile = function () {

    $.mockjaxSettings.responseTime = 500;

    var initAjaxMock = function () {
        //ajax mocks

        $.mockjax({
            url: '/post',
            response: function (settings) {
                console.log(this);
                console.log(settings);
                //log(settings, this);
                var url = 'estate_profile/update_estate_profile';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:settings.data,              
                    success:function(resp){
                        console.log(resp);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });
            }
        });

        $.mockjax({
            url: '/error',
            status: 400,
            statusText: 'Bad Request',
            response: function (settings) {
                this.responseText = 'Please input correct value';
                console.log(settings, this);
            }
        });

        $.mockjax({
            url: '/status',
            status: 500,
            response: function (settings) {
                this.responseText = 'Internal Server Error';
                console.log(settings, this);
            }
        });

        $.mockjax({
            url: '/groups',
            response: function (settings) {
                this.responseText = [{
                        value: 0,
                        text: 'In-House'
                    }, {
                        value: 1,
                        text: 'Appointed'
                    }
                ];
                console.log(settings, this);
            }
        });

    }

    var EditableEstate = function() {
        $.fn.editable.defaults.inputclass = 'form-control';
        $.fn.editable.defaults.url = '/post';

        $('#estatename').editable({
            url: '/post',
            type: 'text',
            name: 'name',
            pk: $('table').data('estateid')
        });

        $('#estateslogan').editable({
            url: '/post',
            type: 'text',
            name: 'slogan',
            pk: $('table').data('estateid')
        });

        $('#estateaddress').editable({
            url: '/post',
            type: 'text',
            name: 'address',
            pk: $('table').data('estateid'),
            success: function(response, newValue) {
                address.address = newValue;
                setLocation();
            }
        });

        $('#estatecity').editable({
            url: '/post',
            type: 'text',
            name: 'city',
            pk: $('table').data('estateid'),
            success: function(response, newValue) {
                address.city = newValue;
                setLocation();
            }
        });

        $('#state_province').editable({
            url: '/post',
            type: 'text',
            name: 'state_province',
            success: function(response, newValue) {
                address.province = newValue;
                setLocation();
            }
        });

        var countries = [];
        $.each({
            "BD": "Bangladesh",
            "BE": "Belgium",
            "BF": "Burkina Faso",
            "BG": "Bulgaria",
            "BA": "Bosnia and Herzegovina",
            "BB": "Barbados",
            "WF": "Wallis and Futuna",
            "BL": "Saint Bartelemey",
            "BM": "Bermuda",
            "BN": "Brunei Darussalam",
            "BO": "Bolivia",
            "BH": "Bahrain",
            "BI": "Burundi",
            "BJ": "Benin",
            "BT": "Bhutan",
            "JM": "Jamaica",
            "BV": "Bouvet Island",
            "BW": "Botswana",
            "WS": "Samoa",
            "BR": "Brazil",
            "BS": "Bahamas",
            "JE": "Jersey",
            "BY": "Belarus",
            "O1": "Other Country",
            "LV": "Latvia",
            "RW": "Rwanda",
            "RS": "Serbia",
            "TL": "Timor-Leste",
            "RE": "Reunion",
            "LU": "Luxembourg",
            "TJ": "Tajikistan",
            "RO": "Romania",
            "PG": "Papua New Guinea",
            "GW": "Guinea-Bissau",
            "GU": "Guam",
            "GT": "Guatemala",
            "GS": "South Georgia and the South Sandwich Islands",
            "GR": "Greece",
            "GQ": "Equatorial Guinea",
            "GP": "Guadeloupe",
            "JP": "Japan",
            "GY": "Guyana",
            "GG": "Guernsey",
            "GF": "French Guiana",
            "GE": "Georgia",
            "GD": "Grenada",
            "GB": "United Kingdom",
            "GA": "Gabon",
            "SV": "El Salvador",
            "GN": "Guinea",
            "GM": "Gambia",
            "GL": "Greenland",
            "GI": "Gibraltar",
            "GH": "Ghana",
            "OM": "Oman",
            "TN": "Tunisia",
            "JO": "Jordan",
            "HR": "Croatia",
            "HT": "Haiti",
            "HU": "Hungary",
            "HK": "Hong Kong",
            "HN": "Honduras",
            "HM": "Heard Island and McDonald Islands",
            "VE": "Venezuela",
            "PR": "Puerto Rico",
            "PS": "Palestinian Territory",
            "PW": "Palau",
            "PT": "Portugal",
            "SJ": "Svalbard and Jan Mayen",
            "PY": "Paraguay",
            "IQ": "Iraq",
            "PA": "Panama",
            "PF": "French Polynesia",
            "BZ": "Belize",
            "PE": "Peru",
            "PK": "Pakistan",
            "PH": "Philippines",
            "PN": "Pitcairn",
            "TM": "Turkmenistan",
            "PL": "Poland",
            "PM": "Saint Pierre and Miquelon",
            "ZM": "Zambia",
            "EH": "Western Sahara",
            "RU": "Russian Federation",
            "EE": "Estonia",
            "EG": "Egypt",
            "TK": "Tokelau",
            "ZA": "South Africa",
            "EC": "Ecuador",
            "IT": "Italy",
            "VN": "Vietnam",
            "SB": "Solomon Islands",
            "EU": "Europe",
            "ET": "Ethiopia",
            "SO": "Somalia",
            "ZW": "Zimbabwe",
            "SA": "Saudi Arabia",
            "ES": "Spain",
            "ER": "Eritrea",
            "ME": "Montenegro",
            "MD": "Moldova, Republic of",
            "MG": "Madagascar",
            "MF": "Saint Martin",
            "MA": "Morocco",
            "MC": "Monaco",
            "UZ": "Uzbekistan",
            "MM": "Myanmar",
            "ML": "Mali",
            "MO": "Macao",
            "MN": "Mongolia",
            "MH": "Marshall Islands",
            "MK": "Macedonia",
            "MU": "Mauritius",
            "MT": "Malta",
            "MW": "Malawi",
            "MV": "Maldives",
            "MQ": "Martinique",
            "MP": "Northern Mariana Islands",
            "MS": "Montserrat",
            "MR": "Mauritania",
            "IM": "Isle of Man",
            "UG": "Uganda",
            "TZ": "Tanzania, United Republic of",
            "MY": "Malaysia",
            "MX": "Mexico",
            "IL": "Israel",
            "FR": "France",
            "IO": "British Indian Ocean Territory",
            "FX": "France, Metropolitan",
            "SH": "Saint Helena",
            "FI": "Finland",
            "FJ": "Fiji",
            "FK": "Falkland Islands (Malvinas)",
            "FM": "Micronesia, Federated States of",
            "FO": "Faroe Islands",
            "NI": "Nicaragua",
            "NL": "Netherlands",
            "NO": "Norway",
            "NA": "Namibia",
            "VU": "Vanuatu",
            "NC": "New Caledonia",
            "NE": "Niger",
            "NF": "Norfolk Island",
            "NG": "Nigeria",
            "NZ": "New Zealand",
            "NP": "Nepal",
            "NR": "Nauru",
            "NU": "Niue",
            "CK": "Cook Islands",
            "CI": "Cote d'Ivoire",
            "CH": "Switzerland",
            "CO": "Colombia",
            "CN": "China",
            "CM": "Cameroon",
            "CL": "Chile",
            "CC": "Cocos (Keeling) Islands",
            "CA": "Canada",
            "CG": "Congo",
            "CF": "Central African Republic",
            "CD": "Congo, The Democratic Republic of the",
            "CZ": "Czech Republic",
            "CY": "Cyprus",
            "CX": "Christmas Island",
            "CR": "Costa Rica",
            "CV": "Cape Verde",
            "CU": "Cuba",
            "SZ": "Swaziland",
            "SY": "Syrian Arab Republic",
            "KG": "Kyrgyzstan",
            "KE": "Kenya",
            "SR": "Suriname",
            "KI": "Kiribati",
            "KH": "Cambodia",
            "KN": "Saint Kitts and Nevis",
            "KM": "Comoros",
            "ST": "Sao Tome and Principe",
            "SK": "Slovakia",
            "KR": "Korea, Republic of",
            "SI": "Slovenia",
            "KP": "Korea, Democratic People's Republic of",
            "KW": "Kuwait",
            "SN": "Senegal",
            "SM": "San Marino",
            "SL": "Sierra Leone",
            "SC": "Seychelles",
            "KZ": "Kazakhstan",
            "KY": "Cayman Islands",
            "SG": "Singapore",
            "SE": "Sweden",
            "SD": "Sudan",
            "DO": "Dominican Republic",
            "DM": "Dominica",
            "DJ": "Djibouti",
            "DK": "Denmark",
            "VG": "Virgin Islands, British",
            "DE": "Germany",
            "YE": "Yemen",
            "DZ": "Algeria",
            "US": "United States",
            "UY": "Uruguay",
            "YT": "Mayotte",
            "UM": "United States Minor Outlying Islands",
            "LB": "Lebanon",
            "LC": "Saint Lucia",
            "LA": "Lao People's Democratic Republic",
            "TV": "Tuvalu",
            "TW": "Taiwan",
            "TT": "Trinidad and Tobago",
            "TR": "Turkey",
            "LK": "Sri Lanka",
            "LI": "Liechtenstein",
            "A1": "Anonymous Proxy",
            "TO": "Tonga",
            "LT": "Lithuania",
            "A2": "Satellite Provider",
            "LR": "Liberia",
            "LS": "Lesotho",
            "TH": "Thailand",
            "TF": "French Southern Territories",
            "TG": "Togo",
            "TD": "Chad",
            "TC": "Turks and Caicos Islands",
            "LY": "Libyan Arab Jamahiriya",
            "VA": "Holy See (Vatican City State)",
            "VC": "Saint Vincent and the Grenadines",
            "AE": "United Arab Emirates",
            "AD": "Andorra",
            "AG": "Antigua and Barbuda",
            "AF": "Afghanistan",
            "AI": "Anguilla",
            "VI": "Virgin Islands, U.S.",
            "IS": "Iceland",
            "IR": "Iran, Islamic Republic of",
            "AM": "Armenia",
            "AL": "Albania",
            "AO": "Angola",
            "AN": "Netherlands Antilles",
            "AQ": "Antarctica",
            "AP": "Asia/Pacific Region",
            "AS": "American Samoa",
            "AR": "Argentina",
            "AU": "Australia",
            "AT": "Austria",
            "AW": "Aruba",
            "IN": "India",
            "AX": "Aland Islands",
            "AZ": "Azerbaijan",
            "IE": "Ireland",
            "ID": "Indonesia",
            "UA": "Ukraine",
            "QA": "Qatar",
            "MZ": "Mozambique"
        }, function (k, v) {
            countries.push({
                id: k,
                text: v
            });
        });

        $('#estatecountry').editable({
            inputclass: 'form-control input-medium',
            source: countries,
            name:'country',
            pk: $('table').data('estateid'),
            success: function(response, newValue) {
                address.country = newValue;
                setLocation();
            }
        });

        $('#phonenumber').editable({
            url: '/post',
            type: 'text',
            name: 'phone_number',
            pk: $('table').data('estateid'),
            validate:function(value){      
                if(!valib.String.isNumeric(value)) {
                    return 'Can contain only numbers';
                }
                if(value.length < 7) {
                    return 'Should be 7 digits minimum';
                }
                
            }  
        });

        $('#estateemail').editable({
            url: '/post',
            type: 'text',
            name: 'email',
            pk: $('table').data('estateid'),
            validate:function(value){      
                if(!valib.String.isEmailLike(value)) {
                    return 'Please insert valid mail';
                }
            }  
        });

        $('#estate_developer_1').editable({
            url: '/post',
            type: 'text',
            name: 'developer_1',
            pk: $('table').data('estateid')
        });

        $('#estate_developer_2').editable({
            url: '/post',
            type: 'text',
            name: 'developer_2',
            pk: $('table').data('estateid')
        });

        $('#land_plot').editable({
            url: '/post',
            type: 'text',
            name: 'land_plot',
            pk: $('table').data('estateid')
        });

        $('#estate_tenure').editable({
            url: '/post',
            type: 'text',
            name: 'tenure',
            pk: $('table').data('estateid')
        });

        $('#estate_management').editable({
            inputclass: 'form-control',
            source: [{
                    value: 0,
                    text: 'In-House'
                }, {
                    value: 1,
                    text: 'Appointed'
                }
            ],
            name: "management",
            pk: $('table').data('estateid')
        });

        $('#management_contact').editable({
            url: '/post',
            type: 'text',
            name: 'management_contact',
            title: 'Enter Estate Management Contact Name',
            pk: $('table').data('estateid')
        });

        /*
            Estate Fund & Share Disclosure
        */
        $('#estate_maintenance_fund_per_month').editable({
            url: '/post',
            type: 'text',
            name: 'maintenance_fund_per_month',
            pk: $('table').data('estateid')
        });

        $('#estate_sinking_fund_per_month').editable({
            url: '/post',
            type: 'text',
            name: 'sinking_fund_per_month',
            pk: $('table').data('estateid')
        });

        $('#estate_monthly_payable_fund').editable({
            url: '/post',
            type: 'text',
            name: 'monthly_payable_fund',
            pk: $('table').data('estateid')
        });

        $('#estate_shares_5').editable({
            url: '/post',
            type: 'text',
            name: 'shares_5',
            pk: $('table').data('estateid')
        });

        $('#estate_shares_6').editable({
            url: '/post',
            type: 'text',
            name: 'shares_6',
            pk: $('table').data('estateid')
        });

        $('#estate_shares_7').editable({
            url: '/post',
            type: 'text',
            name: 'shares_7',
            pk: $('table').data('estateid')
        });

        $('#estate_shares_8').editable({
            url: '/post',
            type: 'text',
            name: 'shares_8',
            pk: $('table').data('estateid')
        });       

    }

    var ImageUpload = function() {

        $('input[name=file]').on('change', function(){
            var file = $(this).get(0).files;
            if(file&&file.length>0){
                if(file[0].type=='image/jpg'||file[0].type=='image/png'||file[0].type=='image/bmp'||file[0].type=="image/jpeg"){
                    if($(this).parent().next().hasClass('disabled')){
                        $(this).parent().next().removeClass('disabled');
                    }
                }else{
                    if(!$(this).parent().next().hasClass('disabled')){
                        $(this).parent().next().addClass('disabled');
                    }
                }
            }else{
                if(!$(this).parent().next().hasClass('disabled')){
                    $(this).parent().next().addClass('disabled');
                }
            }
        });
    }

    var ChangeFont = function() {
        $('.selectfont').select2({
            placeholder: "Select an option",
            allowClear: true
        }).on('select2-selecting', function(e){
            if($('.change-font').hasClass('disabled')){
                $('.change-font').removeClass('disabled');
            }
            var type = $('.selectfont').find(':selected').data('type');
            var fontfamily = e.val;
            var linkhtml = '<link href="http://fonts.googleapis.com/css?family='+fontfamily+'&subset=all" rel="stylesheet" type="text/css"/>';
            $('.import-font').html(linkhtml);
            $('#preview-font').css('font-family',fontfamily.replace('+', ' ')+','+type);
        }).on('select2-removed', function(e){
            if(!$('.change-font').hasClass('disabled')){
                $('.change-font').addClass('disabled');
            }
            $('#preview-font').css('font-family','Open Sans, serif');
        });

        $('.change-font').on('click', function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            url = "estate_profile/update_estate_font";
            data = {
                'font_id':$('.selectfont').find(':selected').data('id')
            }
            $.ajax({
                url:url,
                method:'post',
                dataType:'json',
                data:data,
                success:function(resp){
                    return resp;
                },
                error:function(error){
                    return error;
                }
            });
        })
    }
    var map;
    var setLocation = function() {
        var location = address.country+', '+address.city+', '+address.address;
        GMaps.geocode({
                address: location,
                callback: function(results, status){
                if(status=='OK'){
                    var latlng = results[0].geometry.location;
                    map.setCenter(latlng.lat(), latlng.lng());
                    map.addMarker({
                        lat: latlng.lat(),
                        lng: latlng.lng()
                    });
                    $('#address_error').hide();
                } else {
                    $('#address_error').show();
                }
                }
            });
    }
    var initMap = function(el) {
        map = new GMaps({
            el: el,
            lat: -12.043333,
            lng: -77.028333
        });
    }

    return {
        //main function to initiate the module
        init: function () {

            // inii ajax simulation
            initAjaxMock();

            EditableEstate();

            ImageUpload();
            ChangeFont();

            // if($('meta[name=user-type]').attr('content')!='manager'){
            //     $('#profile .editable').editable('disable');
            // }

        },

        initMap: function(el) {
            initMap(el); 
            setLocation();
        }

    };

}();