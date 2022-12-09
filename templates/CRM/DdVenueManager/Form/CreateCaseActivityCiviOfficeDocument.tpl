<div class="crm-block crm-form-block">

  <div class="crm-section">
    <div class="label">{$form.document_uri.label}</div>
    <div class="content">{$form.document_uri.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.document_renderer_uri.label}</div>
    <div class="content">{$form.document_renderer_uri.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-section">
    <div class="label">{$form.target_mime_type.label}</div>
    <div class="content">{$form.target_mime_type.html}</div>
    <div class="clear"></div>
  </div>

  <div class="crm-submit-buttons">
  {include file="CRM/common/formButtons.tpl" location="bottom"}
  </div>
</div>
