@extends('layouts/app')


@section('title', 'Edit')


@section('container')
<div class="d-flex d-flex-row justify-content-center" style="height: 75vh;">
    <div class="container-fluid">
        <h4>Markdown Text</h4>
        <hr>

        <div class="container w-100 h-100 border p-3">
            <textarea class="h-100 w-100" id="md"> </textarea>
        </div>

    </div>
    <div class="container-fluid">
        <h4>Rendered result <button class="btn btn-outline-info ml-auto" onclick="printEl()">Print</button></h4>
        <hr>
        <div class="container-fluid h-100 overflow-auto">
            <div id="rendered"></div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="{{asset('assets/vendor/markdownit/js/markdown-it.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendor/markdownit/plugins/markdown-it-attrs.browser.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendor/markdownit/plugins/markdown-it-sub.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/vendor/markdownit/plugins/markdown-it-sup.js')}}" type="text/javascript"></script>

    <!-- Highlight.JS -->
    <link rel="stylesheet" href="{{('assets/vendor/hljs/style/atom-one-dark.css')}}">
    <script src="{{ asset('assets/vendor/hljs/js/highlight.min.js')}}"></script>

    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{asset('assets/vendor/codemirror/css/codemirror.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/codemirror/css/theme/ambiance.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/codemirror/css/theme/lucario.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/codemirror/css/theme/mdn-like.css')}}">


    <script src="{{asset('assets/vendor/codemirror/js/codemirror.js')}}"></script>
    <script src="{{asset('assets/vendor/codemirror/js/markdown.js')}}"></script>

@endsection


@section('script-footer')
    <!-- highlight-js -->


    <script type="text/javascript">

        let editor = document.getElementById('md');
        let c = CodeMirror.fromTextArea(editor, {
            mode: 'markdown',
            lineNumbers: true,
            theme: "mdn-like",
            lineWrapping: true,
            extraKeys: {"Enter": "newlineAndIndentContinueMarkdownList"}
        });

        c.setSize("100%", "100%");
        c.on("keyup", function(e){
            let r = document.getElementById("rendered");
            let md = window.markdownit({
                html: true,
                linkify: true,
                typographer: true
            });

            md.set({
                highlight: function (str, lang) {
                    if (lang && hljs.getLanguage(lang)) {
                        try {
                            return '<pre class="hljs"><code>' +
                                hljs.highlight(lang, str, true).value +
                                '</code></pre>';
                        } catch (__) {}
                    }

                    return '<pre class="hljs"><code>' + md.utils.escapeHtml(str) + '</code></pre>';
                }
            });

            md.use(window.markdownItAttrs);
            md.use(window.markdownitSub);
            md.use(window.markdownitSup);

            let result = md.render(e.getValue());

            r.innerHTML = result;
        });

        function printEl(){
            let head = document.getElementsByTagName("head")[0].innerHTML;
            let re = document.getElementById("rendered").innerHTML;
            let w = window.open('', "", 'height=700', "width=500");
            w.document.write('<html>');
            w.document.write(head);
            w.document.write("<body>")
            w.document.write('<div class="container" style="max-width: 780px;">'+ re + "</div>");
            w.document.write('</body></html>');

            w.document.close();
            w.print();
        }
    </script>
    <!-- // -->
@endsection
