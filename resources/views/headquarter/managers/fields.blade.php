<!-- Name Field -->
<div class="form-group col-sm-12">
    <label for="nickname">名称<span class="bitian">(必填):</span></label>
    {!! Form::text('nickname', null, ['class' => 'form-control']) !!}
</div>



<!-- email Field -->
<div class="form-group col-sm-12">
    <label for="mobile">手机号<span class="bitian">(必填):</span></label>
    {!! Form::text('mobile', null, ['class' => 'form-control']) !!}
</div>

<!-- password Field -->

<div class="form-group col-sm-12">
    <label for="password">密码<span class="bitian">(必填):</span></label>
    {!! Form::text('password', '', ['class' => 'form-control']) !!}
</div>


<input type="hidden" name="type" value="{!! $input['type'] !!}">

@if($input['type'] == '代理商')
<div class="form-group col-sm-12">
    <label for="account">account<span class="bitian">(标识):</span></label>
   @if(!empty($manager)) 
    {!! Form::text('account', null, ['class' => 'form-control' ,'readOnly' => 'readOnly' ]) !!}
   @else
  	{!! Form::text('account', null, ['class' => 'form-control']) !!}
   @endif
</div>

@if(!empty($manager))
  @if(!empty($manager->province) && empty($manager->city))
  <div class="form-group col-sm-12">
      <label for="account">当前代理:省级代理<span class="bitian">({!! app('commonRepo')->cityRepo()->findWithoutFail($manager->province)->name !!})</span><a class="edit" style="padding-left: 20px;">修改</a></label>
  </div>
  @endif

  @if(!empty($manager->province) && !empty($manager->city))
  <div class="form-group col-sm-12">
      <label for="account">当前代理:市级代理<span class="bitian">({!! app('commonRepo')->cityRepo()->findWithoutFail($manager->city)->name !!})</span><a class="edit" style="padding-left: 20px;">修改</a></label>
  </div>
  @endif
@endif

<div class="form-group col-sm-12"  @if(!empty($manager) && !empty($manager->province)) style="display: none;" @endif id="daili">
    <label for="name">是否设置代理:</label>
    <div class="radio">
        <label>
            <input type="radio" name="whether_agency" value="1">是</label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="whether_agency" value="0" checked="checked">否</label>
    </div>
</div>

<div class="form-group col-sm-12" style="display: none;" id="fanwei">
    <label for="name">设置代理范围:</label>
    <div class="radio">
        <label>
            <input type="radio" name="fanwei_agency" value="province">省级代理</label>
    </div>
    <div class="radio">
        <label>
            <input type="radio" name="fanwei_agency" value="city" checked="checked">市级代理</label>
    </div>
</div>


<div class="form-group col-sm-12" style="display: none;" id="province">
    <label for="name">请选择省份:</label>
    <select name="province_id" class="form-control">
        <option value="0">请选择省份</option>
        @foreach ($provinces as $item)
         <option value="{!! $item->id !!}" @if(!$item->selected) disabled="disabled" @endif>
            {!! $item->name !!}
         </option>
        @endforeach
    </select>
</div>


<div class="form-group col-sm-12" style="display: none;" id="city">
    <label for="name">请选择城市:</label>
    <select name="city_id" class="form-control">
        <option value="0">请选择城市</option>
        @foreach ($cities as $item)
         <option value="{!! $item->id !!}" @if(!$item->selected) disabled="disabled" @endif>
            {!! $item->name !!}
         </option>
        @endforeach
    </select>
</div>

@endif

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('保存', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('managers.index') !!}" class="btn btn-default">取消</a>
</div>
