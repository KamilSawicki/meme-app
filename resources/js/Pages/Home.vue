<template>
    <ThreeColumnsLayout>
        <template v-slot:sidebar>
            Hello World from sidebar!
        </template>
        <template v-slot:main>
            Hello World!
            <br>
            <TextInput placeholder="Placeholder test" label="Test label" help="Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.

Why do we use it?
It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).

"></TextInput>
            <Btn color="blue">Hello World</Btn>
            <meme :item="meme" />
        </template>
        <template v-slot:aside>
            Hello World from aside!
        </template>
    </ThreeColumnsLayout>
</template>

<script>
import ThreeColumnsLayout from "@/Layouts/ThreeColumnsLayout";
import TextInput from "@/Components/TextInput";
import Btn from "@/Components/Btn";
import Meme from "@/Components/Meme";

export default {
    name: "Home",
    components: {Meme, ThreeColumnsLayout, TextInput, Btn},
    data() {
        return {
            meme: {
                title: "Hello World!",
                user: 'me',
                date: Date.now(),
                likes: 0,
                url: 'https://media.makeameme.org/created/example-time.jpg',
                comments: [
                    {
                        user: 'me',
                        text: 'Hello World!',
                        date: Date.now()
                    },
                    {
                        user: 'me',
                        text: 'Hello World!',
                        date: Date.now(),
                        replies: [
                            {
                                user: 'me',
                                text: 'Hello World!',
                                date: Date.now()
                            },
                            {
                                user: 'me',
                                text: 'Hello World!',
                                date: Date.now()
                            },
                            {
                                user: 'me',
                                text: 'Hello World!',
                                date: Date.now()
                            }
                        ]
                    },
                    {
                        user: 'me',
                        text: 'Hello World!',
                        date: Date.now()
                    }
                ]
            }
        };
    }
}
</script>

<style scoped>

</style>
