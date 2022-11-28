@push('head')
    <script src="{{ versioned_asset('libs/tinymce/tinymce.min.js') }}" nonce="{{ $cspNonce }}"></script>
@endpush

<div component="wysiwyg-editor"
     option:wysiwyg-editor:language="{{ config('app.lang') }}"
     option:wysiwyg-editor:page-id="{{ $model->id ?? 0 }}"
     option:wysiwyg-editor:text-direction="{{ config('app.rtl') ? 'rtl' : 'ltr' }}"
     option:wysiwyg-editor:image-upload-error-text="{{ trans('errors.image_upload_error') }}"
     option:wysiwyg-editor:server-upload-limit-text="{{ trans('errors.server_upload_limit') }}"
     class="flex-fill flex">

    <textarea id="html-editor"  name="{{$name}}" rows="5"
          @if($errors->has($name)) class="text-neg" @endif>@if(isset($model) || old($name)){{ old($name) ? old($name) : $model->description }}@endif</textarea>
</div>

@if($errors->has($name))
    <div class="text-neg text-small">{{ $errors->first($name) }}</div>
@endif

@include('pages.parts.editor-translations')