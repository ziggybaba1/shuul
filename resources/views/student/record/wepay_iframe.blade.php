 <div id="preapproval_div_id" class="container">
    
</div>
<script type="text/javascript">
	$(document).ready(function() {
	$.ajax({
            url     : '{{url('')}}/wepayurl/url',
            type    : 'POST',
            data    : formDatan,
    success: function (data) {
         var json = JSON.parse(data);
  WePay.iframe_checkout("preapproval_div_id", json.hosted_checkout.checkout_uri);

      },
      error:function(data){
         alert('error');
      },
       cache: false,
        contentType: false,
        processData: false
 });
});
</script>