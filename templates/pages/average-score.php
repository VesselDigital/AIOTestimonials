<div class="wrap">
    <h2>Testimonial's Average Score</h2>

    <div id="poststuff">
        <div class="postbox">
            <div class="postbox-header">
                <h2 class="hndle ui-sortable-handle is-non-sortable">Settings</h2>
            </div>
            <div class="inside">
                <table class="form-table">
                    <tr>
                        <th>Last calculated</th>
                        <td>
                            <?php if($last_recalc instanceof DateTime): ?>
                                <?php echo $last_recalc->format("jS M Y \a\\t h:i:s a"); ?>
                            <?php else: ?>
                                <?php echo esc_html($last_recalc); ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Next re-calculation</th>
                        <td>Never</td>
                    </tr>
                    <tr>
                        <th>Re-calculation schedule</th>
                        <td>
                            <select>
                                <option value="daily">Every Day</option>
                                <option value="monthly">Every Month</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th>Current average score</th>
                        <td><?php echo esc_html($current_rating); ?></td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <div style="display: flex">
                                <form action="admin-post.php" method="POST">
                                    <input type="submit" class="button button-primary" value="Save Settings" />
                                </form>
                                <form action="admin-post.php" method="POST" style="margin-left: 10px">
                                    <?php $aiotestimonials->actions["run_average_score"]->get_form(true); ?>
                                    <input type="submit" class="button button-secondary" value="Update Score Now" />
                                </form>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>