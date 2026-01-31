<div class="wrap">
    <h1>Admin Notes</h1>

    <form id="tcg-san-form">
        <input type="hidden" name="id" value="<?php echo esc_attr($edit->id ?? ''); ?>">

        <table class="form-table">
            <tr>
                <th>Title</th>
                <td>
                    <input type="text" name="title" class="regular-text"
                           value="<?php echo esc_attr($edit->title ?? ''); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Note</th>
                <td>
                    <?php
                    wp_editor($edit->note ?? '', 'note', [
                        'textarea_name' => 'note',
                        'textarea_rows' => 6,
                        'media_buttons' => false,
                    ]);
                    ?>
                </td>
            </tr>
        </table>

        <?php submit_button($edit ? 'Update Note' : 'Add Note'); ?>
    </form>

    <hr>

    <table class="widefat striped">
        <thead>
            <tr>
                <th>Title</th>
                <th>Note</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($notes as $note) : ?>
            <tr>
                <td><?php echo esc_html($note->title); ?></td>
                <td><?php echo wp_kses_post(wp_trim_words($note->note, 20)); ?></td>
                <td><?php echo esc_html($note->created_at); ?></td>
                <td>
                    <a href="?page=tcg-admin-notes&edit=<?php echo $note->id; ?>">Edit</a> |
                    <a href="#" class="tcg-delete" data-id="<?php echo $note->id; ?>">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
