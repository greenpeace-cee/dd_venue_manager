<table style="display: none;">
  <tr>
    <td class="dd-venue-manager__case-client-street-address-wrap label">
      <div class="dd-venue-manager__case-client-street-address">
          {$addressFormatted}
      </div>
    </td>
  </tr>
</table>

{literal}
<style>
  .dd-venue-manager__case-client-street-address {
    overflow: hidden;
    max-width: 350px;
  }
</style>

<script>
  CRM.$(function ($) {
    moveClientStreetAddress();

    function moveClientStreetAddress() {
      var addressBlock = $('.dd-venue-manager__case-client-street-address-wrap');
      var targetElement = $('table.case-summary > tbody > tr > td:first-child');
      targetElement.after(addressBlock);
    }
  });
</script>
{/literal}
