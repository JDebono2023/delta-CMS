<script src="https://cdn.tiny.cloud/1/nr6x1kic6b0k005viyn3krxirv7ush7oc71iwv4t77spddyw/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
        skin: 'tinymce-5',
        plugins: 'lists wordcount advlist ',
        toolbar_mode: 'floating',
        menubar: false,
        mobile: {
            menubar: false,
            plugins: 'lists wordcount advlist ',
            toolbar1: 'undo redo | cut copy paste | wordcount | spellchecker   ',
            toolbar2: 'fontfamily | fontsize | forecolor  bold  italic  underline  ',
            toolbar3: 'alignleft  aligncenter  alignright  alignjustify | outdent  indent | bullist  numlist ',

        },

        toolbar1: 'undo redo | cut copy paste | wordcount | spellchecker | alignleft  aligncenter  alignright  alignjustify ',
        toolbar2: 'fontfamily | fontsize |  forecolor  bold  italic  underline |  outdent  indent | bullist  numlist ',


        advlist_bullet_styles: 'default,circle,square',
        advlist_number_styles: 'default,lower-alpha,upper-alpha,lower-roman,upper-roman',

        font_family_formats: 'Arial=arial,helvetica,sans-serif; Courier New=courier new,courier,monospace; Tahoma=tahoma,arial,helvetica,sans-serif;',
        // // 'Andale Mono=andale mono,times; Arial=arial,helvetica,sans-serif; Arial Black=arial black,avant garde; Book Antiqua=book antiqua,palatino; Comic Sans MS=comic sans ms,sans-serif; Courier New=courier new,courier; Georgia=georgia,palatino; Helvetica=helvetica; Impact=impact,chicago; Symbol=symbol; Tahoma=tahoma,arial,helvetica,sans-serif; Terminal=terminal,monaco; Times New Roman=times new roman,times; Trebuchet MS=trebuchet ms,geneva; Verdana=verdana,geneva; Webdings=webdings; Wingdings=wingdings,zapf dingbats'
        font_size_formats: '8pt 10pt 12pt 14pt 16pt 18pt 24pt 36pt 48pt',
        color_map: [
            '000000', 'Black',
            '808080', 'Gray',
            'FFFFFF', 'White',
            'FF0000', 'Red',
            'FFFF00', 'Yellow',
            '008000', 'Green',
            '0000FF', 'Blue'
        ]
    });
</script>
