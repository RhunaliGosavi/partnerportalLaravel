

<div class="col-sm-12 col-md-6 col-lg-4">
    <div class="form-group">
        <label for="metics">Metics</label>
        <span class="custome-select" id="metics">
            <select id="selectMetrics">
            <option value="acres">Acres</option>
            <option value="ares">Ares</option>
            <option value="bhighas">Bhighas</option>
            <option value="biswa">Biswa</option>
            <option value="grounds">Grounds</option>
            <option value="guntha">Guntha</option>
            <option value="hectares">Hectares</option>
            <option value="kanal">Kanal</option>
            <option value="square foot">Square Foot</option>
            <option value="square meter">Square Meter</option>
            <option value="square yards">Square Yards</option>
            </select>
        </span>
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
    <div class="form-group">
        <label for="disbursement_amt">Quantity :</label>
        <input type="number" class="form-control" placeholder="Enter Units" id="unit">
    </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
    <button type="button" class="btn btn-primary btn-search custom-btn" onclick="getAreaConversion()">Submit</button>
</div>
<div class="col-12" style="display:none" id="tblDiv">
    <table class="area-tbl">
    <tr>
        <td>Square Foot</td>
        <td id="sqFoot"></td>
    </tr>
    <tr>
        <td>Square meters</td>
        <td id="sqMeter"></td>
    </tr>
    <tr>
        <td>Square Yards</td>
        <td id="sqYard"></td>
    </tr>
    <tr>
        <td>Hectares</td>
        <td id="hect"></td>
    </tr>
    <tr>
        <td>Bhighas</td>
        <td id="bigh"></td>
    </tr>
    <tr>
        <td>Acres</td>
        <td id="acr"></td>
    </tr>
    <tr>
        <td>Guntha</td>
        <td id="gun"></td>
    </tr>
    <tr>
        <td>Grounds</td>
        <td id="ground"></td>
    </tr>
    <tr>
        <td>Biswa</td>
        <td id="biswa"></td>
    </tr>
    <tr>
        <td>Kanal</td>
        <td id="kanal"></td>
    </tr>
    <tr>
        <td>Ares</td>
        <td id="ares"></td>
    </tr>
    </table>
</div>




  <script>
    function getAreaConversion(){

        var metrics=$('#selectMetrics').val();
        var unit=$('#unit').val();

        $.ajax({
            url: base_url+'/sales/kit/get_area_conversion',
            type: "post",
            data: {'metrics':metrics,'unit':unit,_token: '{{csrf_token()}}'} ,
            success: function (response) {

                var res=JSON.parse(response);
                $('#tblDiv').show();
                $('#sqFoot').text(res.square_foot);
                $('#sqMeter').text(res.square_meter);
                $('#sqYard').text(res.square_yards);
                $('#hect').text(res.hectares);
                $('#bigh').text(res.bhighas);
                $('#acr').text(res.acres);
                $('#gun').text(res.guntha);
                $('#ground').text(res.grounds);
                $('#biswa').text(res.biswa);
                $('#kanal').text(res.kanal);
                $('#ares').text(res.ares);

                console.log(res);

            },
            error: function(jqXHR, textStatus, errorThrown) {
                $('#error_alert').text('Something went wrong ,Please try again');
                $('#alertMsg').show();
            }
        });


    }
    </script>

