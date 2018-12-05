@section('scripts')
<script type="text/javascript">
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_minimal-blue'
        });

    $('#password').attr('type','password');

    $('.edit').click(function(){
    	$('#daili').show();
    });

    //是否设置代理
	$('input:radio[name=whether_agency]').click(function(){
			var val=parseInt($(this).val());
			if(val == 1){
				$('#fanwei').show();
			}
			else{
				$('#fanwei').hide();
				$('#province').hide();
				$('#city').hide();
			}
			$('input:radio[name=fanwei_agency]').trigger('click');
	});

	//设置省级代理还是市级代理
	$('input:radio[name=fanwei_agency]').click(function(){
			if($(this).val() == 'province'){
				$('#province').show();
				$('#city').hide();
			}
			else{
				$('#city').show();
				$('#province').hide();
			}
	});


</script>
@endsection