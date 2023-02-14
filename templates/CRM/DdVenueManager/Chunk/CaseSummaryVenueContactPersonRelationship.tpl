<div class="dd-venue-manager__venue-relations">
  <div class="crm-accordion-wrapper">
    <div class="crm-accordion-header">Contact Persons [{$relations|@count}]</div>
    <div class="crm-accordion-body">

      <div class="crm-submit-buttons dd-venue-manager__venue-relations-add-new">
        <a class="button crm-hover-button crm-popup"
           href="{crmURL p='civicrm/dd-venue-manager/venue-contact-person-relationship' q="reset=1&id=`$relation.relationship_id`&cid=`$caseClientId`&caseID=`$caseId`&action=add"}"
        >
          <span class="crm-i fa-pencil"></span>
          <span>Add Contact Person</span>
        </a>
      </div>

      {if $relations}
        <div class="dd-venue-manager__venue-relations-table">
          <table class="dataTable">
            <tr>
              <th>Name</th>
              <th>Phone</th>
              <th>Email</th>
              <th>Primary?</th>
              <th>Position</th>
              <th>Decision Maker?</th>
              <th>DDC Disposition</th>
              <th>On-Site Contact</th>
              <th>Actions</th>
            </tr>
              {foreach from=$relations item=relation}
                <tr>
                  <td>
                    <a href="{crmURL p='civicrm/contact/view' q="reset=1&cid=`$relation.contact_id`"}"  target="_blank">{$relation.contact_display_name}</a>
                  </td>
                  <td>{$relation.contact_primary_phone}</td>
                  <td>{$relation.contact_primary_email}</td>
                  <td>{$relation.venue_contact_primary_label}</td>
                  <td>{$relation.venue_contact_position}</td>
                  <td>{$relation.venue_contact_decision_maker_label}</td>
                  <td>{$relation.venue_contact_ddc_disposition_label}</td>
                  <td>{$relation.venue_contact_on_site_contact_label}</td>
                  <td>
                    <a class="crm-hover-button crm-popup"
                       href="{crmURL p='civicrm/dd-venue-manager/venue-contact-person-relationship' q="reset=1&id=`$relation.relationship_id`&cid=`$caseClientId`&caseID=`$caseId`&action=update"}"
                    >
                      <span class="crm-i fa-pencil"></span>
                      <span>Edit</span>
                    </a>

                    <a class="crm-hover-button crm-popup"
                       href="{crmURL p='civicrm/dd-venue-manager/venue-contact-person-relationship' q="reset=1&id=`$relation.relationship_id`&cid=`$caseClientId`&caseID=`$caseId`&action=delete"}"
                    >
                      <span class="crm-i fa-trash"></span>
                      <span>Delete</span>
                    </a>
                  </td>
                </tr>
              {/foreach}
          </table>
        </div>
      {else}
        <div>This case has no venue relations.</div>
      {/if}
    </div>
  </div>
</div>

{literal}
<style>

.dd-venue-manager__venue-relations-table {
  padding: 5px 0 20px 0;
}

.dd-venue-manager__venue-relations-add-new {
  padding: 0 0 5px 0 !important;
}

</style>
{/literal}
