<?php echo $this->Form->create('MenuLink'); ?>
    <?php echo $this->Html->useTag('fieldsetstart', __t('Edit menu link')); ?>
        <?php echo $this->Form->input('link_title', array('required' => 'required', 'type' => 'text', 'label' => __t('Menu link title *'))); ?>
        <em><?php echo __t('The text to be used for this link in the menu.'); ?></em>
        <?php if ($this->data['MenuLink']['module'] == 'Menu'): ?>
            <?php echo $this->Form->input('router_path', array('required' => 'required', 'type' => 'text', 'label' => __t('Path *'))); ?>
            <em><?php echo __t("The path for this menu link. This can be an internal QuickApps path such as /type-of-content/my-post.html or an external URL such as http://quickapps.es. Enter '/' to link to the front page."); ?></em>
        <?php else: ?>
            <label><?php echo __t('Path'); ?></label>
            <p>
                <?php $_url = !empty($this->data['MenuLink']['link_path']) ? $this->data['MenuLink']['link_path'] : $this->data['MenuLink']['router_path']; ?>
                <?php echo $this->Html->link($this->data['MenuLink']['link_title'], $_url); ?>
                <?php echo $this->Form->input('router_path', array('type' => 'hidden')); ?>
                <?php echo $this->Form->input('parent_id', array('type' => 'hidden')); ?>
            </p>
        <?php endif; ?>
        <?php echo $this->Form->input('description', array('type' => 'textarea', 'label' => __t('Description'), 'class' => 'plain', 'rows' => 2)); ?>
        <em><?php echo __t('Shown when hovering over the menu link.'); ?></em>

        <?php echo $this->Form->input('target', array('type' => 'select', 'label' => __t('Target window'), 'options' => array('_self' => __t('Same window'), '_blank' => __t('New window')))); ?>
        <em><?php echo __t('Target browser window when the link is clicked.'); ?></em>

        <p>&nbsp;</p>

        <?php echo $this->Html->useTag('fieldsetstart', __t('Show as selected:')); ?>
            <?php
                echo $this->Form->input('selected_on_type',
                    array(
                        'legend' => false,
                        'type' => 'radio',
                        'options' => array(
                            'reg' => __t('When URL match any those listed'),
                            'php' => __t('When following PHP code returns TRUE (experts only)')
                        ),
                        'separator' => '<br />'
                    )
                );
            ?>

            <?php echo $this->Form->input('selected_on', array('type' => 'textarea', 'label' => false)); ?>
            <em>
                <?php echo __t("Specify pages by using their paths. Enter one path per line. The '*' character is a wildcard. Example paths are blog for the blog page and blog/* for every blog entry. '/' is the front page."); ?>
                <?php echo __t('If the PHP option is chosen, enter PHP code between &lt;?php ?&gt;. Note that executing incorrect PHP code can break your QuickApps site.'); ?>
            </em>
        <?php echo $this->Html->useTag('fieldsetend'); ?>

        <?php echo $this->Form->input('expanded', array('type' => 'checkbox', 'label' => __t('Show as expanded'))); ?>
        <em><?php echo __t('If selected and this menu link has children, the menu will always appear expanded.'); ?></em>
        <p>&nbsp;</p>
        <?php echo $this->Form->input('status', array('type' => 'checkbox', 'label' => __t('Enabled'))); ?>
        <em><?php echo __t('Menu links that are not enabled will not be listed in any menu.'); ?></em>
        <p>&nbsp;</p>

        <?php echo __t('Go to <a href="%s">menu links</a> list to reparent this link.', $this->Html->url('/admin/menu/manage/links/' . $this->data['MenuLink']['menu_id'])); ?>
    <?php echo $this->Html->useTag('fieldsetend'); ?>
    <?php echo $this->Form->submit(__t('Save')); ?>
<?php echo $this->Form->end(); ?>