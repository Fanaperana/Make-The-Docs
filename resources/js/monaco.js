import * as monaco from "monaco-editor"

let editor;

export default editor = monaco.editor.create(document.getElementById("md"), {
    value: '### Hello prince',
    theme: 'vs-dark',
    language: 'markdown',
    automaticLayout: true,
    scrollBeyondLastLine: false,
});


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

r.innerHTML = md.render(editor.getValue());

editor.onDidChangeModelContent((e) => {
    r.innerHTML = md.render(editor.getValue());
});


