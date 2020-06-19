<table class="crm-form-block crm-contribution-buttondisplay">
  <tr>
    <td class="label">{$form.button_display_for_options.label}</td>
    <td class="content">
      {$form.button_display_for_options.html} <br />
      <span class='description'>All radio and checkbox fields are displayed as buttons instead of default inputs.</span>
    </td>
  </tr>
</table>

{literal}
<script>
  CRM.$(function($) {
    // Move the fields to the right place
    $('#recurFields > td > table tr:last').after($('.crm-contribution-buttondisplay tr'));
    $('.crm-contribution-buttondisplay').remove();
  });
</script>
{/literal}
