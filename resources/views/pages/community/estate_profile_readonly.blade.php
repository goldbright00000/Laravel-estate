    <div class="col-md-6">
    <h3>Estate Informations</h3>
    <hr>
    <table id="profile" class="table table-bordered table-striped" data-estateid="{{$estate->id}}">
        <tbody>
            <tr>
                <td class="col-md-6">
                        Name
                </td>
                <td class="col-md-6">
                    {{$estate->name}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Slogan
                </td>
                <td class="col-md-6">
                    {{$estate->slogan}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Address
                </td>
                <td class="col-md-6">
                    {{$estate->address}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        City
                </td>
                <td class="col-md-6">
                    {{$estate->city}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        State/Province
                </td>
                <td class="col-md-6">
                    {{$estate->state_province}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Country
                </td>
                <td class="col-md-6">
                    {{$estate->country}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Main Phone Number
                </td>
                <td class="col-md-6">
                    {{$estate->phone_number}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Main Email Address
                </td>
                <td class="col-md-6">
                    {{$estate->email}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Original Developer(1)
                </td>
                <td class="col-md-6">
                    {{$estate->developer_1}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Original Developer(2)
                </td>
                <td class="col-md-6">
                    {{$estate->developer_2}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Land/Plot Registration
                </td>
                <td class="col-md-6">
                    {{$estate->land_plot}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Tenure
                </td>
                <td class="col-md-6">
                    {{$estate->tenure}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Management
                </td>
                <td class="col-md-6">
                    {{$estate->management}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Management Contact Name
                </td>
                <td class="col-md-6">
                    {{$estate->management_contact}}
                </td>
            </tr>
        </tbody>
    </table>
    <h3>Estate Fund & Share Disclosure</h3>
    <hr>
    <table id="fund_share" class="table table-bordered table-striped" data-estateid="{{$estate->id}}">
        <tbody>
            <tr>
                <td class="col-md-6">
                        Maintenance Fund per Month
                </td>
                <td class="col-md-6">
                    {{$estate->maintenance_fund_per_month}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Sinking Fund per Month
                </td>
                <td class="col-md-6">
                    {{$estate->sinking_fund_per_month}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        Monthly Payable Fund
                </td>
                <td class="col-md-6">
                    {{$estate->monthly_payable_fund}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        5 Shares
                </td>
                <td class="col-md-6">
                    {{$estate->shares_5}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        6 Shares
                </td>
                <td class="col-md-6">
                    {{$estate->shares_6}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        7 Shares
                </td>
                <td class="col-md-6">
                    {{$estate->shares_7}}
                </td>
            </tr>
            <tr>
                <td class="col-md-6">
                        8 Shares
                </td>
                <td class="col-md-6">
                    {{$estate->shares_8}}
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
    </div>
    <h3>Estate Unit Floor Plan</h3>
    <hr>                    
    <div class="unit floor plane row">
        <div class="preview-pane col-md-12">
            <p style="text-align:center">
                <img src="{{url('uploads/floorplan/'.$estate->floor_plan)}}"/>
            </p>
        </div>
    </div>
</div>