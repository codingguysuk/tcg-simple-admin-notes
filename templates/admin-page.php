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

    <form id="tcg-san-search">
        <input type="search" name="search" placeholder="Search notes..." />
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


