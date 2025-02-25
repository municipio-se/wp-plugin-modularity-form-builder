<div {!! $field['conditional_hidden'] !!} class="o-grid mod-form-field">
    <div class="o-grid-12@md">
        <div class="form-group">
            <div hidden id="{{sanitize_title($field['name']) . '-preview'}}" class="c-imageinput__preview">
                <div class="c-imageinput__image material-icons {{$aspectRatioClass}}"></div>
                <span></span>
            </div>
            @fileinput([
                'name' => sanitize_title($field['name']),
                'description' => !empty($field['description'])
                    ? ModularityFormBuilder\Helper\SanitizeData::convertLinks($field['description'])
                    : '',
                'buttonLabel' => $field['button_label'],
                'required' => $field['required'] ? true : false,
                'display' => 'area',
                'multiple' => $field['type'] === 'multiple' ? true : false,
                'label' => $field['label'],
                'accept' => $field['filetypes'] && is_array($field['filetypes']) ? $field['attributeList']['accept'] : '',
                'filesMax' => $field['type'] === 'multiple' ? $field['files_max'] : 1,
                'classList' => [$field['required'] ? 'data-js-required' : ''],
                'attributeList' => [
                    'data-image-preview' => sanitize_title($field['name']) . '-preview',
                ]
            ])
            @endfileinput

            @typography(['element' => 'p', 'variant' => 'meta'])
                {{ $field['maxFilesNotice'] }}
            @endtypography

        </div>
    </div>
</div>
