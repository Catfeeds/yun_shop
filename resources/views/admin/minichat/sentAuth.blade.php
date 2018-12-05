@extends('admin.layouts.app')

@section('content')
	<div>小程序的标签，多个标签用空格分隔，标签不能多于10个，标签长度不超过20</div>
    <input type="text" name="tags" value="" placeholder="小程序的标签，多个标签用空格分隔，标签不能多于10个，标签长度不超过20">

    <select name="cat">
    	@foreach ($cats as $element)
    		<option value="{{ $element->first_id }}-{{ $element->first_class }}-{{ $element->second_id }}-{{ $element->second_class }}">{{ $element->first_class }}-{{ $element->second_class }}</option>
    	@endforeach
    </select>

    <button onclick="submit()">提交审核</button>
@endsection

@section('scripts')
    <script type="text/javascript">
    	function submit(){
    		$.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url:'/zcjy/ajax/mini_chat_sent_auth',
                type:'post',
                data:{
                    tag: $('input[name=tags]').val(),
                    cat: $('select[name=cat]').val()
                },
                success:function(data){
                    if (data.code == 0) {
                    	layer.msg(data.message, {icon: 1});
                  	}else{
                    	layer.msg(data.message, {icon: 5});
                  	}
                }
            });
    	}
    </script>
@endsection