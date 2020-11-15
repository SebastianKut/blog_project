<div class="card read-card">
    <div class="card-body">

        <h4 class="card-title"><?= $title; ?></h4>
        <hr>
        <?php
        if( $is_member && $lastPost < $msgid ) {
            echo '<span class = "new-post">NEW</span>';
            $update = true;
        }
        ?>             
        <span class="post-time">Posted by <?= $username; ?> on <?= date('d-M-Y g:i a', $postdate); ?> (Eastern Time)</span>
        <p class="card-text"><?= $post; ?></p>            

    </div>
</div> 