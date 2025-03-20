<?php
if (!defined('ABSPATH')) exit;
?>
<div class="wrap">
    <h1 class="text-2xl font-bold mb-4">My Plugin Settings</h1>
    <form method="post" action="options.php">
        <?php settings_fields('wowsnippets_settings_group'); ?>
        <div class="bg-white shadow-md rounded-lg p-6 w-full md:w-2/3 lg:w-1/2">

            <!-- Site Title -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Site Title</label>
                <input type="text" name="wowsnippets_settings_data[site_title]" value="<?php echo esc_attr($this->settings['site_title']); ?>" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300">
            </div>

            <!-- Enable Feature -->
            <div class="mb-4">
                <label class="flex items-center">
                    <input type="checkbox" name="wowsnippets_settings_data[enable_feature]" value="1" <?php checked($this->settings['enable_feature'], '1'); ?>>
                    <span class="ml-2 text-gray-700">Enable Feature</span>
                </label>
            </div>

            <!-- Custom Message -->
            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2">Custom Message</label>
                <textarea name="wowsnippets_settings_data[custom_message]" rows="4" class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-300"><?php echo esc_textarea($this->settings['custom_message']); ?></textarea>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Save Settings</button>
            </div>
        </div>
    </form>
</div>
