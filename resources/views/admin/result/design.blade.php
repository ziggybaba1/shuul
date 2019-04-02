@extends('layouts.admin')
@section('content')
<style type="text/css">
   td{
    text-align: center;
    font-size:12px;
}
</style>
<div id="contenter">
<form>
    <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Result Sheet Design</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">sheet-design</li>
                        </ol>
                    </div>
                    <div class="col-md-7 col-4 align-self-center">
                        <div class="d-flex m-t-10 justify-content-end">
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>THIS MONTH</small></h6>
                                    <h4 class="m-t-0 text-info">$58,356</h4></div>
                                <div class="spark-chart">
                                    <div id="monthchart"></div>
                                </div>
                            </div>
                            <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                                <div class="chart-text m-r-10">
                                    <h6 class="m-b-0"><small>LAST MONTH</small></h6>
                                    <h4 class="m-t-0 text-primary">$48,356</h4></div>
                                <div class="spark-chart">
                                    <div id="lastmonthchart"></div>
                                </div>
                            </div>
                            <div class="">
                                <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                <div class="card-body" id="content-main">
                
                        <div class="inline-editor">               
                    <h6 style="text-align: center; ">
                        <b>
                            <font face="Arial Black">MARGARET THELMA INTERNATIONAL SCHOOL<br></font>
                        </b>
                <small>Block 9 &amp; 10, Ministry of Transport Quarters Karu, Abuja<br>
                </small>
                <small>08033343014, 08120657687<br>
                </small>
                <a>
                <small>www.margaretthelmaschool.org</small>
            </a>
            <p style="text-align: center; "></p>
            <p style="text-align: center; ">
                <b>E.C.C.D.E. RESULT SHEET</b>
            </p>
            <p style="text-align: left;">
                <small>NAME:</small>
                &nbsp; &nbsp; &nbsp;
                <small>SEX: &nbsp; &nbsp; &nbsp; AGE:</small>
            </p><p style="text-align: left;">
                 <small>TERM:</small>&nbsp; &nbsp; &nbsp; &nbsp; 
            <small>YEAR:</small>&nbsp; &nbsp; &nbsp; &nbsp;
                <small>CLASS:</small> 
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <small>NUMBER IN CLASS:</small>

            </p>
            <p style="text-align: left;">
                <small>NUMBER OF TIMES SCHOOL OPENED:</small> 
                &nbsp; &nbsp; 
                <small>NUMBER OF TIMES PRESENT:</small>&nbsp; &nbsp; &nbsp; &nbsp;
                <small>NEXT TERM BEGINS:</small>
            </p>
          
        </h6>
                    <div class="row">
<div style="width:60%;"><h6>
<table class="table table-bordered">
<tbody>
<tr style="height:50%;">
<td style="text-align: center;font-size:10px;"><br></td>
<td style="text-align: center;font-size:10px;"><small><b>MID<br>TERM<br>TEST</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>EXAMINATION</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>TOTAL<br>SCORE</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>CLASS<br>AVERAGE</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>GRADE</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>REMARKS</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small>MAXIMUM MARKS OBTAINABLE</small><br></td>
<td style="text-align: center;font-size:10px;"><small>20%</small></td>
<td style="text-align: center;font-size:10px;"><small>80%</small></td>
<td style="text-align: center;font-size:10px;"><small>100%</small></td>
<td></td>
<td></td>
<td></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
<tr>
<td style="text-align: center;font-size:10px;"><small><b>MATHEMATICS</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>20</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>80</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>100</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>89</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>A</b></small></td>
<td style="text-align: center;font-size:10px;"><small><b>DISTINCTION</b></small></td>
</tr>
</tbody>
</table>
</h6>
<div class="row">
    <div style="width:10%;"></div>
<div style="width:40%;">
<h6 style="text-align: center; ">
 <p style="text-align: left;"><small>TOTAL SCORE:</small></p> <br>
<p style="text-align: left;"><small>AVERAGE SCORE:</small></p><br> 
<p style="text-align: left;"><small>GRADE:</small></p><br>
</h6>
</div>
<div style="width:50%;">
 <small>Class Facilitator's Comment:...............................</small>
 <small>.....................................................</small><br>
 <small>Signature:.....................</small><br>
 <small>Date:.....................</small><br>
</div>

</div>
<div class="row">
  <div style="width:10%;"></div>
<div style="width:60%;">
 <small>Head Facilitator's Comment:...............................</small>
 <small>.....................................................,</small><br>
 <small>Signature:.....................</small><br>
 <small>Date:.....................</small><br>
</div> 
</div>
</div>
<div style="width:9%;"></div>
<div style="width:30%;">
    
 <div class="row">
        <h6>
<table class="table table-bordered">
<tbody>
     <tr>
<td colspan="6" style="text-align: center;font-size:10px;"><small>BEHAVIOURAL/PERSONALITY</small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>RATINGS</small></td>
        <td style="text-align: center;font-size:10px;"><small>5</small></td>
        <td style="text-align: center;font-size:10px;"><small>4</small></td>
        <td style="text-align: center;font-size:10px;"><small>3</small></td>
        <td style="text-align: center;font-size:10px;"><small>2</small></td>
        <td style="text-align: center;font-size:10px;"><small>1</small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Punctuality</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Work habit</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Loyalty</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Cleanliness</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Honesty</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Honesty</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Politeness</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Responsibility</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Self Control</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Home work</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>Relationship with others</small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
        <td style="text-align: center;font-size:10px;"><small></small></td>
    </tr>
</tbody>
</table>
</h6>
<h6>
<table class="table table-bordered">
<tbody>
     <tr>
        <td style="text-align: center;font-size:10px;" colspan="4">KEY TO RATINGS</td>
    </tr>
    <tr>
        <td style="text-align: center;font-size:10px;"><small>5-Excellent</small></td>
         <td  style="text-align: center;font-size:10px;"><small>4-High Degree</small></td>
           <td style="text-align: center;font-size:10px;" colspan="1"><small>3-Acceptance Level</small></td>
    </tr>
     <tr>
      <td style="text-align: center;font-size:10px;"><small>2-Poor Level</small></td>
        <td style="text-align: center;font-size:10px;" colspan="1"><small>1-Indifferent</small></td> 
        <td style="text-align: center;font-size:10px;"></td> 
    </tr>
   
</tbody>
</table>
</h6>
<h6>
<table class="table table-bordered">
<tbody>
     <tr>
<td style="text-align: center;font-size:10px;" colspan="4"><small>PHYSICAL DEVELOPMENT</small></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;" colspan="2"><small>HEIGHT</small></td>
<td style="text-align: center;font-size:10px;" colspan="2"><small>WEIGHT</small></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;"><small>Begining</small></td>
<td style="text-align: center;font-size:10px;"><small>End of Term</small></td>
<td style="text-align: center;font-size:10px;"><small>Begining</small></td>
<td style="text-align: center;font-size:10px;"><small>End of Term</small></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;"></td>
<td style="text-align: center;font-size:10px;"></td>
<td style="text-align: center;font-size:10px;"></td>
<td style="text-align: center;font-size:10px;"></td>
    </tr>
    <tr>
<td style="text-align: center;font-size:10px;">Facilitator's Remarks</td>
<td colspan="3" style="text-align: center;font-size:10px;"></td>
    </tr>
</tbody>
</table>
</h6>
</div>
<div class="row">
       
</div>
</div>
</div>
<div class="row">
 
</div> 
<br>  
<div class="row">


</div>
<p><br></p>
</div>

</div>  
</div>
</div>
</div>
<div class="row">
<div class="col-md-4">
<a onclick="printpage()" class="btn btn-sm btn-primary btn-block">Print Result Design</a>
</div>
<div class="col-md-4">
   <input type="submit" class="btn btn-sm btn-primary btn-block" value="Save Design"> 
</div>
</div>
</form> 
<div class="row">

<div class="col-md-4">
</div>
<div class="col-md-4">
 
</div>
</div>       
</div>
 <script src="{{url('')}}/assets/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        //alert($('#contenter').html());
    });
</script>
<script type="text/javascript">
    $(".formsubmit").submit(function(e) {
  var formDatan = new FormData(this);
   jQuery('#showresultshere').html('<div style="text-align:center;margin-top:200px;"><img src="{{url('')}}/assets/images/preloader.gif" style="height:50px;" /></div>');
    $form = $(this);
  $.ajax({
            url     : $form.attr('action'),
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
        swal("Information Saved!", "clicked the button to continue!", "success");
        jQuery('#showresultshere').html(data);
      },
      error:function(data){
         alert(data);
      },
       cache: false,
        contentType: false,
        processData: false
 });
   e.preventDefault();
});
</script>
@endsection