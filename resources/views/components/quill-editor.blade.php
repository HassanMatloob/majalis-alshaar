<div>
    <div id="toolbar-container-{{$id}}">
        <span class="ql-formats">
        <select class="ql-font"></select>
        <select class="ql-size"></select>
        </span>
        <span class="ql-formats">
        <button class="ql-bold"></button>
        <button class="ql-italic"></button>
        <button class="ql-underline"></button>
        <button class="ql-strike"></button>
        </span>
        <span class="ql-formats">
        <button class="ql-header" value="1"></button>
        <button class="ql-header" value="2"></button>
        <button class="ql-blockquote"></button>
        <!-- <button class="ql-code-block"></button> -->
        </span>
        <span class="ql-formats">
        <button class="ql-list" value="ordered"></button>
        <button class="ql-list" value="bullet"></button>
        <button class="ql-indent" value="-1"></button>
        <button class="ql-indent" value="+1"></button>
        </span>
        <span class="ql-formats">
        <button class="ql-direction" value="rtl"></button>
        <select class="ql-align"></select>
        </span>
        <span class="ql-formats">
        <button class="ql-link"></button>
        <button class="ql-image"></button>
        </span>
        <!-- <span class="ql-formats">
        <button class="ql-clean"></button>
        </span> -->
    </div>
    <div id="{{ $id }}"></div>
    <textarea name="{{ $name }}" id="{{$id}}" hidden>{{old($name)}}</textarea>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var quill{{ $id }} = new Quill('#{{ $id }}',
            {
                placeholder: '{{ $placeholder }}',
                theme: 'snow',
                modules: {
                    syntax: true,
                    toolbar: '#toolbar-container-{{$id}}',
                }
            }
        );

        var initialValue = `{!! $value !!}`;
        quill{{$id}}.root.innerHTML = initialValue;
        quill{{$id}}.on('text-change', function(){
            
            var content = quill{{$id}}.root.innerHTML;
            
            document.querySelector('textarea[name="{{ $id }}"]').value = content;
        });
        document.querySelectorAll('.ql-toolbar select').forEach(select => {
            select.addEventListener('mousedown', (event) => {
                event.stopPropagation();
            });
            select.addEventListener('click', (event) => {
                event.stopPropagation();
            });
        });
    });
  </script>
