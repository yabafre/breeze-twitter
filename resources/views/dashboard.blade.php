<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="w-full max-w-6xl mx-auto rounded-xl bg-white shadow-lg p-5 text-black" x-data="app()" x-init="init($refs.wysiwyg)">
            <div class="border border-gray-200 overflow-hidden rounded-md">
                <div class="w-full flex border-b border-gray-200 text-xl text-gray-600">
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('bold')">
                        <i class="mdi mdi-format-bold"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('italic')">
                        <i class="mdi mdi-format-italic"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('underline')">
                        <i class="mdi mdi-format-underline"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','P')">
                        <i class="mdi mdi-format-paragraph"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H1')">
                        <i class="mdi mdi-format-header-1"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H2')">
                        <i class="mdi mdi-format-header-2"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('formatBlock','H3')">
                        <i class="mdi mdi-format-header-3"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('insertUnorderedList')">
                        <i class="mdi mdi-format-list-bulleted"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 mr-1 hover:text-indigo-500 active:bg-gray-50" @click="format('insertOrderedList')">
                        <i class="mdi mdi-format-list-numbered"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-l border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyLeft')">
                        <i class="mdi mdi-format-align-left"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyCenter')">
                        <i class="mdi mdi-format-align-center"></i>
                    </button>
                    <button class="outline-none focus:outline-none border-r border-gray-200 w-10 h-10 hover:text-indigo-500 active:bg-gray-50" @click="format('justifyRight')">
                        <i class="mdi mdi-format-align-right"></i>
                    </button>
                </div>
                <div class="w-full">
                    <iframe x-ref="wysiwyg" class="w-full h-96 overflow-y-auto"></iframe>
                </div>
            </div>
        </div>
    </div>
    <script>
        function app() {
            return {
                wysiwyg: null,
                init: function(el) {
                    // Get el
                    this.wysiwyg = el;
                    // Add CSS
                    this.wysiwyg.contentDocument.querySelector('head').innerHTML += `
            <style>
                *, ::after, ::before {box-sizing: border-box;}
                :root {tab-size: 4;}
                html {line-height: 1.15;text-size-adjust: 100%;}
                body {margin: 0px; padding: 1rem 0.5rem;}
                body {font-family: Supreme-Bold, -apple-system, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";}
            </style>`;
                    // Add JS
                    const ioniconsScript = document.createElement('script');
                    ioniconsScript.type = 'module';
                    ioniconsScript.src = 'https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js';
                    this.wysiwyg.contentDocument.head.appendChild(ioniconsScript);

                    const ioniconsFallbackScript = document.createElement('script');
                    ioniconsFallbackScript.src = 'https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js';
                    this.wysiwyg.contentDocument.head.appendChild(ioniconsFallbackScript);

                    // Add content
                    if(this.wysiwyg.contentDocument.body.innerHTML.trim() === ''){
                        this.wysiwyg.contentDocument.body.innerHTML = `
                <h1><ion-icon name="logo-twitter"></ion-icon> #Welcome #twitter #got #webstart #dev</h1>
                <p>Bienvenue sur votre compte Mini-Twitter</p>
                `;
                    }
                    // Make editable
                    this.wysiwyg.contentDocument.designMode = "on";
                },
                format: function(cmd, param) {
                    this.wysiwyg.contentDocument.execCommand(cmd, !1, param||null)
                }
            }
        }
    </script>

</x-app-layout>
