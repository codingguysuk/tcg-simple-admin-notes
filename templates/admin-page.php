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

    <form method="get" action="<?php echo esc_url(admin_url('admin.php')); ?>">
        <input type="hidden" name="page" value="tcg-admin-notes">
    
        <input type="search" name="search" value="<?php echo esc_attr($_GET['search'] ?? ''); ?>" placeholder="Search notes...">
    
        <button class="button">Search</button>
    </form>

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
                        
            <tr data-id="<?= esc_attr($note->id); ?>">

                <!-- Editable title cell -->
                <td class="tcg-edit-title" contenteditable="true" spellcheck="true">
                    <?= esc_html($note->title); ?>
                </td>
            
                <!-- Editable note cell -->
                <td class="tcg-edit-note" contenteditable="true" spellcheck="true">
                    <?= esc_html($note->note); ?>
                </td>

                <td><?php echo esc_html($note->created_at); ?></td>
            
                <!-- Actions column -->
                <td>
                    <button class="button button-primary tcg-save-inline">
                        Save
                    </button>
            
                    <button class="button button-link-delete tcg-delete" data-id="<?= esc_attr($note->id); ?>">
                        Delete
                    </button>
                </td>
            
            </tr>

        <?php endforeach; ?>
        </tbody>
    </table>
</div>




