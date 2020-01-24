                        <div class="col-md-6">
                            <h3>Estate Informations</h3>
                            <hr>
                            <table id="profile" class="table table-bordered table-striped" data-estateid="{{$estate->id}}">
                                <tbody>
                                    <tr>
                                        <td class="col-md-3">
                                             Name
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estatename" data-type="text"  data-original-title="Enter Estate Name">
                                            {{$estate->name}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Slogan
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estateslogan" data-type="text"  data-original-title="Enter Estate Slogan">
                                            {{$estate->slogan}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Address
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estateaddress" data-type="text" data-original-title="Enter Estate Address">
                                            {{$estate->address}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             City
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estatecity" data-type="text"  data-original-title="Enter Estate City">
                                            {{$estate->city}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             State/Province
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="state_province" data-type="text" data-pk="2" data-original-title="Enter Estate State/Province">{{$estate->state_province}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Country
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estatecountry" data-type="select2"  data-value="{{$estate->country}}" data-original-title="Select Estate country">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Main Phone Number
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="phonenumber" data-type="text"  data-original-title="Enter Estate Main PhoneNumber">
                                            {{$estate->phone_number}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Main Email Address
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estateemail" data-type="text"  data-original-title="Enter Estate Email Address">
                                            {{$estate->email}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Original Developer(1)
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_developer_1" data-type="text"  data-original-title="Enter Estate Orignal Developer(1)">
                                            {{$estate->developer_1}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Original Developer(2)
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_developer_2" data-type="text"  data-original-title="Enter Estate Orignal Developer(2)"> {{$estate->developer_2}}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Land/Plot Registration
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="land_plot" data-type="text"  data-original-title="Enter Land/Plot Registration">  {{$estate->land_plot}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Tenure
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_tenure" data-type="text"  data-original-title="Enter Estate Tenure">
                                                {{$estate->tenure}}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Management
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_management" data-type="select"  data-value="{{$estate->management}}" data-original-title="Select Management">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Management Contact Name
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="management_contact" data-type="text"  data-original-title="Enter Management Contact Name"> {{$estate->management_contact}}
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <h3>Estate Fund & Share Disclosure</h3>
                            <hr>
                            <table id="fund_share" class="table table-bordered table-striped" data-estateid="{{$estate->id}}">
                                <tbody>
                                    <tr>
                                        <td class="col-md-3">
                                             Maintenance Fund per Month
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_maintenance_fund_per_month" data-type="text"  data-original-title="Enter Maintenance Fund per Month">
                                            {{$estate->maintenance_fund_per_month}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Sinking Fund per Month
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_sinking_fund_per_month" data-type="text"  data-original-title="Enter Sinking Fund per Month">
                                            {{$estate->sinking_fund_per_month}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             Monthly Payable Fund
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_monthly_payable_fund" data-type="text" data-original-title="Enter Monthly Payable Fund">
                                            {{$estate->monthly_payable_fund}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             5 Shares
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_shares_5" data-type="text"  data-original-title="Enter 5 Shares">
                                            {{$estate->shares_5}} </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             6 Shares
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_shares_6" data-type="text" data-original-title="Enter 6 Shares">{{$estate->shares_6}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             7 Shares
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_shares_7" data-type="text" data-original-title="Enter 7 Shares">{{$estate->shares_7}}</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3">
                                             8 Shares
                                        </td>
                                        <td class="col-md-9">
                                            <a href="javascript:;" id="estate_shares_8" data-type="text" data-original-title="Enter 8 Shares">{{$estate->shares_8}}</a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>                    
                            <h3>Estate Banner</h3>
                            <hr>
                            <div class="row estate_banner">
                                <div class="preview-banner col-md-12">
                                    <p style="text-align:center">
                                        <img src="{{$banner}}"/>
                                    </p>
                                </div>
                                <form action="estate_profile/upload_estate_image" method="POST" enctype="multipart/form-data">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar col-md-12">
                                        <div class="pull-right">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                                <span class="btn green fileinput-button">
                                                    <i class="fa fa-plus"></i>
                                                    <span>Add file... </span>
                                                    <input type="file" name="file" accept="image/*">
                                                </span>
                                                <button type="submit" class="btn blue start disabled">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Start upload </span>
                                                </button>
                                                <input type="hidden" name="id" value="{{$estate->id}}"/>
                                                <input type="hidden" name="type" value="banner"/>
                                        </div>
                                    </div>
                                </form>
                            </div>                    
                         </div>
                        <div class="col-md-6">   
                            <h3>Estate Site Map</h3>
                            <hr>
                            <div class="row site-map">
                                <div class="preview-pane col-md-12">
                                    <p style="text-align:center">
                                        <img src="{{$sitemap}}"/>
                                    </p>
                                </div>
                                <form action="estate_profile/upload_estate_image" method="POST" enctype="multipart/form-data" class="col-md-12">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-md-12">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <p style="text-align:center">
                                                <span class="btn green fileinput-button">
                                                    <i class="fa fa-plus"></i>
                                                    <span>Add file... </span>
                                                    <input type="file" name="file" accept="image/*">
                                                </span>
                                                <button type="submit" class="btn blue start disabled">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Start upload </span>
                                                </button>
                                                <input type="hidden" name="id" value="{{$estate->id}}"/>
                                                <input type="hidden" name="type" value="sitemap"/>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <h3>Estate Unit Floor Plan</h3>
                            <hr>                    
                            <div class="unit floor plane row">
                                <div class="preview-pane col-md-12">
                                    <p style="text-align:center">
                                        <img src="{{url('uploads/floorplan/'.$estate->floor_plan)}}"/>
                                    </p>
                                </div>
                                <form action="estate_profile/upload_estate_floorplan" method="POST" enctype="multipart/form-data" class="col-md-12">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar">
                                        <div class="col-md-12">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <p style="text-align:center">
                                                <span class="btn green fileinput-button">
                                                    <i class="fa fa-plus"></i>
                                                    <span>Add file... </span>
                                                    <input type="file" name="file" accept="image/*">
                                                </span>
                                                <button type="submit" class="btn blue start disabled">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Start upload </span>
                                                </button>
                                                <input type="hidden" name="id" value="{{$estate->id}}"/>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            @if ($rolesetting->estate_manager ==1 || $rolesetting->estate_officer == 1 || $rolesetting->estate_developer == 1)
                            <h3>Estate Logo</h3>
                            <hr>
                            <div class="row estate_logo">
                                <!--div class="preview-logo pull-left col-md-6"-->
                                <div class="preview-logo col-md-12">
                                    <p style="text-align:center">
                                        <img src="{{$logo}}"/>
                                    </p>
                                </div>
                                <form action="estate_profile/upload_estate_image" method="POST" enctype="multipart/form-data" class="col-md-12">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    {{csrf_field()}}
                                    <div class="row fileupload-buttonbar">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                        <div class="col-md-12">
                                            <p style="text-align:center">
                                                <span class="btn green fileinput-button">
                                                    <i class="fa fa-plus"></i>
                                                    <span>Add file... </span>
                                                    <input type="file" name="file" accept="image/*">
                                                </span>
                                                <button type="submit" class="btn blue start disabled">
                                                    <i class="fa fa-upload"></i>
                                                    <span>Start upload </span>
                                                </button>
                                                <input type="hidden" name="id" value="{{$estate->id}}"/>
                                                <input type="hidden" name="type" value="logo"/>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <h3>Estate Name Font</h3>
                            <hr>
                            <div class="row estate_name">
                                <div class="import-font">
                                    <link href="https://fonts.googleapis.com/css?family={{str_replace(' ', '+', $current_font->font_name)}}&subset=all" rel="stylesheet" type="text/css"/>
                                </div>
                                <div class="preview-estate-name col-md-6">
                                    <p id="preview-font" style="font-size:30px; text-align:center; font-family:{{$current_font->font_name}},{{$current_font->font_type}}">
                                        {{$estate->name}}
                                    </p>
                                </div>
                                <div class="row col-md-6">
                                <form role="form">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->                        
                                    <div class="form-group col-md-9">
                                        <select class="form-control selectfont" data-placeholder="Select...">
                                            <option value=""></option>
                                            @foreach($fonts as $key => $font)
                                                @if($font->id==$current_font->id)
                                                    <option value="{{str_replace(' ', '+', $font->font_name)}}" data-type="{{$font->font_type}}" data-id={{$font->id}} selected>{{$font->font_name}}</option>
                                                @else
                                                    <option value="{{str_replace(' ', '+', $font->font_name)}}" data-type="{{$font->font_type}}" data-id={{$font->id}}>{{$font->font_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <button class="btn blue change-font disabled">Change</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                            @endif
                        </div>