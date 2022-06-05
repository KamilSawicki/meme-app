<?php

namespace App\Enums;

enum VoteEnum: int {
    case DownVote = -1;
    case NeutralVote = 0;
    case UpVote = 1;
}
