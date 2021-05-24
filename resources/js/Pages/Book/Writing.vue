<template>
    <app-layout>
        <app-container v-if="chapter">
            <div class="flex items-center w-full">
                <div @click="runEditorCommand('undo')" class="icon-hoverable cursor-pointer hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#BEBDB8" fill-rule="nonzero">
                                <g>
                                    <path d="M16.15 7.65c-.47 0-.85.38-.85.85.02 3.284-2.295 6.12-5.517 6.756-3.222.637-6.441-1.106-7.67-4.151C.883 8.059 1.99 4.57 4.753 2.79c2.76-1.778 6.395-1.344 8.66 1.034h-2.04c-.47 0-.85.38-.85.85s.38.85.85.85h3.85c.47 0 .85-.38.85-.85V.85c0-.47-.38-.85-.85-.85-.469 0-.85.38-.85.85v1.504C11.456-.436 6.979-.787 3.66 1.512.341 3.81-.903 8.127.684 11.839c1.586 3.712 5.565 5.797 9.52 4.987C14.16 16.016 17 12.537 17 8.5c0-.225-.09-.442-.249-.601-.16-.16-.376-.249-.601-.249z" transform="translate(-350 -39) matrix(-1 0 0 1 367 39)"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
                <div @click="runEditorCommand('redo')" class="ml-6 icon-hoverable cursor-pointer hover:text-black">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 17 17">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#BEBDB8" fill-rule="nonzero">
                                <g>
                                    <path d="M16.15 7.65c-.47 0-.85.38-.85.85.02 3.284-2.295 6.12-5.517 6.756-3.222.637-6.441-1.106-7.67-4.151C.883 8.059 1.99 4.57 4.753 2.79c2.76-1.778 6.395-1.344 8.66 1.034h-2.04c-.47 0-.85.38-.85.85s.38.85.85.85h3.85c.47 0 .85-.38.85-.85V.85c0-.47-.38-.85-.85-.85-.469 0-.85.38-.85.85v1.504C11.456-.436 6.979-.787 3.66 1.512.341 3.81-.903 8.127.684 11.839c1.586 3.712 5.565 5.797 9.52 4.987C14.16 16.016 17 12.537 17 8.5c0-.225-.09-.442-.249-.601-.16-.16-.376-.249-.601-.249z" transform="translate(-391 -39) translate(391 39)"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>

                <div class="mx-auto w-1/2">
                    <div class="ml-20 flex w-full">
                        <svg @click="runEditorCommand('find', $refs['chapter_search_input'].value)" class="icon-hoverable" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><g fill="none" fill-rule="evenodd"><g fill="#BEBDB8" fill-rule="nonzero"><g><g><path d="M18.738 17.453l-3.357-3.33c2.705-3.373 2.302-8.273-.918-11.158C11.243.079 6.328.213 3.271 3.27.213 6.328.079 11.243 2.965 14.463c2.885 3.22 7.785 3.623 11.158.918l3.33 3.33c.17.17.401.267.642.267s.473-.096.643-.268c.339-.35.339-.906 0-1.257zm-9.69-2.072c-3.498 0-6.334-2.836-6.334-6.333 0-3.498 2.836-6.334 6.334-6.334 3.497 0 6.333 2.836 6.333 6.334 0 1.68-.667 3.29-1.855 4.478-1.188 1.188-2.799 1.855-4.478 1.855z" transform="translate(-740 -40) translate(740 40)"></path></g></g></g></g></svg>
                        <input ref="chapter_search_input" type="text" class="input-default input-default_p-zero ml-4 w-full" @keydown.tab="tabSearch" v-on:keyup.enter="handleSearch" placeholder="Search..">
                    </div>
                </div>

                <div class="text-right ml-auto flex">
                    <div class="icon-hoverable flex items-center relative">
                        <div class="relative flex items-center toggle-dropdown" @click="toggleDropdown(chapter.id)">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <g fill="none" fill-rule="evenodd">
                                    <g fill="#BEBDB8" fill-rule="nonzero">
                                        <g>
                                            <path d="M15.898 13v1.152h-1.736v3.585h-1.426v-3.585H11V13h4.898zM10.834 0c.328 0 .623.184.768.47l.047.113.522 1.568c.127.377.493.612.88.581l.106-.015 1.612-.326c.322-.067.65.057.849.31l.068.102L17.4 5.769c.166.285.152.637-.028.906l-.075.096L16.2 8.006c-.256.29-.281.712-.077 1.03l.077.101 1.157 1.234c.22.246.278.594.157.893l-.054.11-.074.126h-2.033l.256-.443-.686-.771c-.822-.927-.861-2.3-.118-3.27l.118-.142.686-.771L14.51 4.2l-1.011.206c-1.222.25-2.438-.414-2.9-1.556l-.057-.159-.326-.977H8.023l-.326.969c-.39 1.185-1.57 1.91-2.79 1.743l-.167-.029-1.011-.206L2.63 6.077l.686.772c.832.93.871 2.313.119 3.285l-.119.143-.686.772 1.115 1.894 1.011-.206c1.222-.25 2.438.414 2.9 1.556l.057.158.309.978 2.076-.001v1.715H7.466c-.346.018-.664-.173-.814-.478l-.043-.105-.523-1.569c-.127-.376-.493-.611-.88-.58l-.106.015-1.611.325c-.323.067-.65-.056-.85-.31l-.068-.101-1.714-2.966c-.17-.282-.162-.633.013-.905l.073-.098L2.03 9.137c.256-.291.282-.712.077-1.03l-.077-.101L.943 6.77c-.216-.249-.267-.596-.141-.894l.055-.108 1.714-2.966c.157-.265.442-.422.744-.42l.114.008 1.654.326c.389.08.777-.117.945-.467l.04-.099.48-1.568c.11-.328.406-.554.744-.581L7.406 0h3.428zM9.12 5.143c.91 0 1.781.361 2.424 1.004s1.005 1.515 1.005 2.424c0 1.894-1.535 3.429-3.429 3.429s-3.429-1.535-3.429-3.429c0-1.893 1.535-3.428 3.429-3.428zm0 1.714c-.947 0-1.714.768-1.714 1.714 0 .947.767 1.715 1.714 1.715s1.714-.768 1.714-1.715c0-.946-.767-1.714-1.714-1.714z" transform="translate(-1254 -39) translate(1254 39)"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>


                            <svg class="ml-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="10" height="6" viewBox="0 0 10 6">
                                <defs>
                                    <path id="mu619htkfa" d="M3.167 4.988L.423 2.244c-.326-.325-.853-.325-1.179 0-.325.326-.325.853 0 1.179l3.333 3.333c.326.325.853.325 1.179 0l3.333-3.333c.326-.326.326-.853 0-1.179-.325-.325-.853-.325-1.178 0L3.167 4.988z"/>
                                </defs>
                                <g fill="#BEBDB8" fill-rule="evenodd">
                                    <g>
                                        <g transform="translate(-1279 -46) rotate(90 621.5 667)">
                                            <use fill="#BEBDB8" transform="rotate(-90 3.167 4.5)" xlink:href="#mu619htkfa"/>
                                        </g>
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <div v-click-outside="hideDropdowns" :id="'dropdown-menu-' + chapter.id" class="character-in-list__dropdown-menu dropdown-menu character-in-list__dropdown-menu_bottom bg-light flex flex-col opacity-0 hidden">
                            <div class="hover:text-black" @click="setEditorStyle('book-style')">Book</div>
                            <div class="mt-4 hover:text-black" @click="setEditorStyle('a4-style')">A4</div>
                            <div class="mt-4 hover:text-black cursor-pointer flex items-center">
                                <label class="cursor-pointer">
                                    Background
                                    <input type="checkbox" :checked="editor_style.includes('_background')" class="ml-2" @change="toggleEditorBackground()">
                                </label>
                            </div>
                        </div>
                    </div>

                    <svg @click="$htmlToPaper('chapter-print')" class="ml-8 icon-hoverable" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                        <g fill="none" fill-rule="evenodd">
                            <g fill="#BEBDB8" fill-rule="nonzero">
                                <g>
                                    <path d="M4 6.4c-.442 0-.8.358-.8.8 0 .442.358.8.8.8.442 0 .8-.358.8-.8 0-.442-.358-.8-.8-.8zm9.6-3.2h-.8V.8c0-.442-.358-.8-.8-.8H4c-.442 0-.8.358-.8.8v2.4h-.8C1.075 3.2 0 4.275 0 5.6v4.8c0 1.325 1.075 2.4 2.4 2.4h.8v2.4c0 .442.358.8.8.8h8c.442 0 .8-.358.8-.8v-2.4h.8c1.325 0 2.4-1.075 2.4-2.4V5.6c0-1.325-1.075-2.4-2.4-2.4zM4.8 1.6h6.4v1.6H4.8V1.6zm6.4 12.8H4.8v-3.2h6.4v3.2zm3.2-4c0 .442-.358.8-.8.8h-.8v-.8c0-.442-.358-.8-.8-.8H4c-.442 0-.8.358-.8.8v.8h-.8c-.442 0-.8-.358-.8-.8V5.6c0-.442.358-.8.8-.8h11.2c.442 0 .8.358.8.8v4.8z" transform="translate(-1354 -41) translate(1354 41)"/>
                                </g>
                            </g>
                        </g>
                    </svg>
                </div>
            </div>

            <div v-if="chapter" class="chapter-container" :class="{'bg-light': editor_style.includes('_background')}">
                <div class="chapter-container__inner" :class="'chapter-container__inner_'+ editor_style">
                    <div class="fs-18 font-semibold ff-minion text-color-dark">Chapter {{ chapter.number }}</div>
                    <input type="text" class="input-default input-default_border-none h2 w-full" v-model="chapter.title"
                           @change="updateChapterField('title', $event.target.value)" />
                    <div class="mt-12 editor w-full" spellcheck="false" @click="removeTypeHereFromEditor(editor)">
                        <editor-content class="editor__content outline-none fs-18 ff-minion" :editor="editor" />
                    </div>

                    <div id="chapter-print" class="hidden" v-if="editor">
                        <h3>Chapter {{ chapter.number }}</h3>
                        <h1>{{ chapter.title }}</h1>
                        <div v-html="chapter.content"></div>
                    </div>
                </div>
            </div>
        </app-container>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import AppContainer from "../../Layouts/AppContainer";
import {Editor, EditorContent, EditorMenuBar} from "tiptap";
import vClickOutside from 'v-click-outside';
import {
    Blockquote, Bold,
    BulletList, Code,
    CodeBlock,
    HardBreak,
    Heading, History, Italic, Link,
    ListItem,
    OrderedList, Strike,
    TodoItem, TodoList, Underline,
    Search,
} from "tiptap-extensions";

export default {
    components: {AppContainer, AppLayout, EditorMenuBar, EditorContent},

    props: ['chapter'],

    directives: {
        clickOutside: vClickOutside.directive
    },

    data() {
        return {
            editor: null,
            editor_style: 'default-style',
            findFocusedIndex: -1,
        }
    },

    mounted() {
        if (this.chapter) {
            if (localStorage.getItem('editor_style')) {
                this.editor_style = localStorage.getItem('editor_style');
            }

            let content = this.chapter.content;
            if (content === null || content === '' || content === '<p></p>') {
                content = 'Type here..';
            }

            this.editor = new Editor({
                extensions: [
                    new Blockquote(),
                    // new BulletList(),
                    // new CodeBlock(),
                    // new HardBreak(),
                    new Heading({ levels: [1, 2, 3] }),
                    // new ListItem(),
                    // new OrderedList(),
                    // new TodoItem(),
                    // new TodoList(),
                    new Link(),
                    new Bold(),
                    // new Code(),
                    new Italic(),
                    new Strike(),
                    new Underline(),
                    new History(),
                    new Search(),
                ],
                content: content,
                injectCSS: false,
                onUpdate: ({ getHTML }) => {
                    this.updateChapterField('content', getHTML());
                },
                onBlur: () => {
                    if (this.editor.getHTML() === null || this.editor.getHTML() === '' || this.editor.getHTML() === '<p></p>') {
                        this.editor.setContent('Type here..');
                    }
                },
                // editable: false,
            });

            // this.editor.extensions.
        }
    },

    methods: {
        updateChapterField(field, value) {
            console.log('update chapter field');
            const url = '/books/'+ this.$page.book.id +'/chapters/update';

            axios.post(url, {
                id: this.chapter.id,
                field: field,
                value: value,
            }).then((response) => {
                console.log('after update', response.data);
            });
        },

        runEditorCommand(command, params = null) {
            console.log('run command: ', command);
            if (params === null) {
                this.editor.commands[command]();
            } else {
                this.editor.commands[command](params);
            }
        },

        toggleDropdown(chapterId) {
            console.log('toggle dropdown');
            document.getElementById('dropdown-menu-' + chapterId).classList.toggle('opacity-0');
            document.getElementById('dropdown-menu-' + chapterId).classList.toggle('hidden');
            document.getElementById('dropdown-menu-' + chapterId).classList.toggle('active');
        },

        hideDropdowns(event) {
            console.log('hide dropdowns', event);

            const composedPaths = event.composedPath();
            for (let i = 0; i < composedPaths.length; i++) {
                if (
                    composedPaths[i].classList !== undefined
                    && composedPaths[i].classList.contains('toggle-dropdown')
                ) {
                    return false;
                }
            }

            const elements = document.querySelectorAll('.dropdown-menu.active');
            for (let i = 0; i < elements.length; i++) {
                elements[i].classList.add('opacity-0');
                elements[i].classList.add('hidden');
                elements[i].classList.remove('active');
            }
        },

        setEditorStyle(style) {
            if (this.editor_style.includes('_background')) {
                this.editor_style = style + '_background';
            } else {
                this.editor_style = style;
            }

            localStorage.setItem('editor_style', this.editor_style);

            console.log('editor style', this.editor_style);
        },

        toggleEditorBackground() {
            console.log('editor style1', this.editor_style);

            if (this.editor_style.includes('_background')) {
                this.editor_style = this.editor_style.replace('_background', '');
            } else {
                this.editor_style += '_background';
            }

            localStorage.setItem('editor_style', this.editor_style);
            console.log('editor style2', this.editor_style);
        },

        handleSearch() {
            this.runEditorCommand('find', this.$refs['chapter_search_input'].value);
            this.$refs['chapter_search_input'].focus();
            const searchInElement = document.getElementsByClassName('ProseMirror');
            // console.log('editor content', this.editor.getContent());
            // this.editor.setContent('<p style="color: red;">123</p>>');
        },

        mispelt (str, word, className) {
            // replaces all occurrences of the string 'word' in the element
            // 'el' with a span which has a class 'class'
            // Assumes 'word' contains no regexp special chars

            return str.replace (
                RegExp ('\\b(' + word + ')\\b', 'ig'),
                '<span class"' + className + '">$1</span>'
            );
        },

        tabSearch(event) {
            event.preventDefault();
            // alert(1123);
            console.log('123');
            const findedWords = document.getElementsByClassName('find');

            this.findFocusedIndex += 1;
            if (findedWords[this.findFocusedIndex] !== undefined) {
                findedWords[this.findFocusedIndex].style.backgroundColor = '#000';
                findedWords[this.findFocusedIndex].classList.add('PASDADASD');
                findedWords[this.findFocusedIndex].scrollIntoView();
            } else {
                this.findFocusedIndex = -1;
            }
        },
    },
}
</script>
