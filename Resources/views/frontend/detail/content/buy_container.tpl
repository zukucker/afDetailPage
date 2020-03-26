{extends file="parent:frontend/detail/content/buy_container.tpl"}
{block name="frontend_detail_data_ordernumber"}
{$smarty.block.parent}
 <table width="100%" style="with:100%;">
      <tr >
          <td style="border:1px solid black;">Nr.</td>
          <td style="border:1px solid black;">Titel</td>
          <td style="border:1px solid black;">Beschreibung</td>
      </tr>
      <tr>
          <td style="border:1px solid black;">1</td>
          <td style="border:1px solid black;">Buch 1</td>
          <td style="border:1px solid black;">Ein ganz tolles Buch</td>
      </tr>
      <tr>
          <td style="border:1px solid black;">2</td>
          <td style="border:1px solid black;">Buch 2</td>
          <td style="border:1px solid black;">Ein ganz tolles Buch 2</td>
      </tr>
      <tr>
          <td style="border:1px solid black;">3</td>
          <td style="border:1px solid black;">Buch 3</td>
          <td style="border:1px solid black;">Ein ganz tolles Buch 3</td>
      </tr>
  </table>
{/block}
