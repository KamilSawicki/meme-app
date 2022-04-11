<template>
    <div class="element-wrapper">
        <div class="element">
            <div class="element-title">{{ item.title }}</div>
            <div class="element-meta">
                <div class="author">{{ item.user }}</div>
                <div class="date">{{ dateToString }}</div>
            </div>
            <div class="element-content">
                <img :src="item.url" :alt="item.title">
            </div>
            <div class="element-marks">
                <div class="element-actions">
                    <span class="comments-toggle" @click="showComments = !showComments">Zobacz komentarze</span>
                    <span class="comments-toggle">Dodaj komentarz</span>
                </div>
                <div class="likes">
                    <span class="down-vote" @click="downVote">
                        <MinusIcon class="std-icon likes-negative"/>
                    </span>
                    <div class="likes-count"
                         :class="{'likes-negative': likesNegative, 'likes-positive': likesPositive}">
                        {{ item.likes }}
                    </div>
                    <span class="up-vote" @click="upVote">
                        <PlusIcon class="std-icon likes-positive"/>
                    </span>
                </div>
            </div>
            <div class="element-comments" v-show="showComments">
                <Comment :comment="comment" v-for="comment in item.comments"></Comment>
            </div>
        </div>
    </div>
</template>

<script>
import {MinusIcon, PlusIcon} from '@heroicons/vue/outline';
import Comment from "@/Components/Comment";

export default {
    name: "Meme",
    data() {
        return {
            showComments: false,
        }
    },
    props: {
        item: {
            type: Object,
            required: true
        }
    },
    components: {
        Comment,
        MinusIcon,
        PlusIcon
    },
    computed: {
        likesNegative: function () {
            return this.item.likes < 0;
        },
        likesPositive: function () {
            return this.item.likes > 0;
        },
        dateToString: function () {
            const date = new Date(this.item.date);
            return date.getDate() + " " + monthName(date.getMonth(), 'pl-pl') + " " + date.getFullYear();
        },
    },
    methods: {
        toggleComments: function () {
            this.$emit('toggleComments', this.item.id);
        },
        upVote: function () {
            this.item.likes++;
        },
        downVote: function () {
            this.item.likes--;
        }
    }
}
</script>

<style scoped lang="scss">
.element-wrapper {
    margin: 0 auto;
    width: 100%;

    .element {
        margin: 0 auto;
        width: calc( 100% - 2rem );
        padding: 1rem;
        border: 1px solid $box-border-color;
        border-radius: 5px;
        box-shadow: 0 0 2px $box-border-color;
        background-color: $box-bg-color;

        .element-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .element-meta {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;

            .author {
                font-size: 0.8em;
                font-weight: bold;
                color: $main-accent-color;
            }

            .date {
                font-size: 0.8em;
                font-style: italic;
            }
        }

        .element-content {
            margin-bottom: 10px;
            text-align: center;

            img {
                width: 100%;
            }
        }

        .element-actions span {
            margin-right: 1rem;
        }

        .element-marks {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;

            .comments-toggle {
                font-size: 0.8em;
                font-weight: bold;
                cursor: pointer;
            }

            .likes {
                display: flex;
                justify-content: space-between;
                font-size: 1.2em;
                font-weight: bold;
                user-select: none;

                .down-vote, .up-vote {
                    cursor: pointer;
                }

                .likes-count {
                    font-weight: bold;
                    margin: 0 1rem;
                }

                &-negative {
                    color: red;
                }

                &-positive {
                    color: #00dc00;
                }
            }
        }
    }
}
</style>
