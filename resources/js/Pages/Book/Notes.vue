<template>
    <app-layout after_body_class="bg-semilight">
        <app-container width="w-container">
            <div class="flex items-center justify-center">
                <div v-if="!note" class="flex flex-wrap breakdown-header-links">
                    <a :href="'/books/' + book.id + '/notes/group/research'" class="mx-6" :class="{ 'active': isUrlContain('group/research') }">Research</a>
                    <a :href="'/books/' + book.id + '/notes/group/general'" class="mx-6" :class="{ 'active': isUrlContain('group/general') }">General Notes</a>
                    <a :href="'/books/' + book.id + '/notes/group/ideas'" class="mx-6" :class="{ 'active': isUrlContain('group/ideas') }">Story Ideas</a>
                </div>

                <div v-if="note" class="flex flex-wrap breakdown-header-links">
                    <a :href="'/books/' + book.id + '/notes/group/research'" class="mx-6" :class="{ 'active': note.group === 1 }">Research</a>
                    <a :href="'/books/' + book.id + '/notes/group/general'" class="mx-6" :class="{ 'active': note.group === 0 }">General Notes</a>
                    <a :href="'/books/' + book.id + '/notes/group/ideas'" class="mx-6" :class="{ 'active': note.group === 2 }">Story Ideas</a>
                </div>
            </div>

            <div v-if="note" class="mt-24">
                <input type="text" class="input-default input-default_border-none h2" v-model="note.title"
                       @change="updateNoteField('title', $event.target.value)" />
                <div class="mt-4 editor">
                    <editor-content class="editor__content outline-none" :editor="editor" />
                </div>
            </div>
        </app-container>
    </app-layout>
</template>

<script>
import { Editor, EditorContent, EditorMenuBar } from 'tiptap';
import AppContainer from "../../Layouts/AppContainer";
import AppLayout from "../../Layouts/AppLayout";
import {
    Blockquote,
    BulletList,
    CodeBlock,
    HardBreak,
    Heading,
    ListItem,
    OrderedList,
    TodoItem,
    TodoList,
    Bold,
    Code,
    Italic,
    Link,
    Strike,
    Underline,
    History,
} from 'tiptap-extensions';

export default {
    components: {AppLayout, AppContainer, EditorMenuBar, EditorContent},
    props: ['book', 'note'],

    data() {
        return {
            editor: null,
        };
    },

    mounted() {
        if (this.note) {
            this.editor = new Editor({
                extensions: [
                    new Blockquote(),
                    new BulletList(),
                    new CodeBlock(),
                    new HardBreak(),
                    new Heading({ levels: [1, 2, 3] }),
                    new ListItem(),
                    new OrderedList(),
                    new TodoItem(),
                    new TodoList(),
                    new Link(),
                    new Bold(),
                    new Code(),
                    new Italic(),
                    new Strike(),
                    new Underline(),
                    new History(),
                ],
                content: this.note.content,
                onUpdate: ({ getHTML }) => {
                    this.updateNoteField('content', getHTML());
                },
            });
        }
    },

    methods: {
        isUrlContain(value) {
            return window.location.pathname.indexOf(value) > -1;
        },

        updateNoteField(field, value) {
            console.log('update note field');
            const url = '/books/'+ this.$page.book.id +'/notes/update';

            axios.post(url, {
                id: this.note.id,
                field: field,
                value: value,
            }).then((response) => {
                console.log('after update', response.data);
            });
        },
    },
}
</script>
