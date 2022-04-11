<template>
  <div class="comment-wrapper">
      <div class="comment">
          <div class="comment-header">
              <div class="comment-author">{{ comment.user }}</div>
              <div class="comment-date">{{ dateToString }}</div>
          </div>
          <div class="comment-content">{{ comment.text }}</div>
          <div class="comment-replies-wrapper">
              <div class="comment-actions">
                  <span class="show-replies" v-if="comment.replies" @click="showReplies = !showReplies">Pokaż odpowiedzi</span>
              </div>
              <div class="comment-replies" v-show="comment.replies && showReplies">
                  <Comment :comment="replay" v-for="replay in comment.replies"></Comment>
              </div>
          </div>
      </div>
  </div>
</template>

<script>
export default {
    name: "Comment",
    props: {
        comment: {
            type: Object,
            required: true
        }
    },
    data() {
        return {
            showReplies: false
        }
    },
    computed: {
        dateToString() {
            const date = new Date(this.comment.date);
            return date.getHours()
                + ":" + date.getMinutes()
                + " " + date.getDate()
                + " " + monthName(date.getMonth(), 'pl-pl')
                + " " + date.getFullYear();
        }
    }
}
</script>

<style scoped lang="scss">
    .comment-wrapper {
        border-left: 2px solid #e6e6e6;
        padding-left: 1rem;
        position: relative;

        &:before {
            content: "";
            display: block;
            width: .75rem;
            position: absolute;
            height: .75rem;
            left: -2px;
            border-left: 2px solid #e6e6e6;
            border-bottom: 2px solid #e6e6e6;
        }

        &:last-child {
            border-left: none;
            &:before {
                left: 0;
                border-radius: 0 0 0 .5rem;
            }
        }

        .comment {
            &-header {
                display: flex;
                justify-content: space-between;
                .comment-author {
                    font-weight: bold;
                    color: $main-accent-color;
                }
                .comment-date {
                    font-size: 0.8em;
                }
            }
            &-replies-wrapper {
                .comment-actions {
                    display: flex;
                    user-select: none;
                    .show-replies {
                        cursor: pointer;
                        color: $font-color-secondary;
                        font-size: 0.8em;
                        margin-left: 1rem;
                    }
                }
            }
        }
    }
</style>
