<table class="form-table">
  <tr>
    <td>
        <label for="data_inicial"> <strong>Data Inicial:</strong> </label> <br>
        <input type="text" name="data_inicial" id="data_inicial" value="<?php echo esc_attr( $data_inicial ) ?>" class="large-text data" required />
    </td>
    <td>
      <label for="data_final"> <strong>Data Final:</strong> </label> <br>
      <input type="text" name="data_final" id="data_final" value="<?php echo esc_attr( $data_final ) ?>" class="large-text data" />
    </td>
  </tr>
  <tr>
    <td>
      <label for="hora_inicial"> <strong>Hora Inicial:</strong> </label> <br>
      <input type="text" name="hora_inicial" id="hora_inicial" value="<?php echo esc_attr( $hora_inicial ) ?>" class="large-text hora" />
    </td>
    <td>
      <label for="hora_final"> <strong>Hora Final:</strong> </label> <br>
      <input type="text" name="hora_final" id="hora_final" value="<?php echo esc_attr( $hora_final ) ?>" class="large-text hora" />
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <label for="endereco"> <strong>Endereço do evento:</strong> </label> <br>
      <input type="text" name="endereco" id="endereco" value="<?php echo esc_attr( $endereco ) ?>" class="large-text" />
    </td>
  </tr>
</table>
