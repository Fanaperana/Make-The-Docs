@extends('layouts/app')


@section('title', 'Edit')


@section('container')
<div class="d-flex d-flex-row justify-content-center">
    <div class="container-fluid">
        <h4>Markdown Text</h4>
        <hr>
        <textarea name="markdown" class="w-100 h-100" id="md" onkeyup="renderMd()">

        </textarea>
    </div>
    <div class="container-fluid">
        <h4>Rendered result</h4>
        <hr>
        <div class="container-fluid">
            <div id="rendered"></div>
        </div>
    </div>
</div>
@endsection


@section('script')
    <script src="{{asset('assets/vendor/markdownit/js/markdown-it.min.js')}}" type="text/javascript"></script>

    <!-- Highlight.JS -->
    <link rel="stylesheet" href="{{('assets/vendor/hljs/style/atom-one-dark.css')}}">
    <script src="{{ asset('assets/vendor/hljs/js/highlight.min.js')}}"></script>

@endsection


@section('script-footer')
    <script type="text/javascript">
        function renderMd(){
            let mdText = document.getElementById('md').value;
            let renderedMd = document.getElementById('rendered');

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

            let result = md.render(mdText.toString());

            renderedMd.innerHTML = result;
            // console.log(result);


            let x = document.getElementsByTagName('table');
            // x.setAttribute("class", "table");
            x.forEach(function(n){
                n.setAttribute("class", "table");
            })
        }

        renderMd();
    </script>
@endsection