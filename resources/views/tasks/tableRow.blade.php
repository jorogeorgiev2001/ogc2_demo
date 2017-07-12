
               <script id="details-template" type="text/x-handlebars-template">
                  <table class="table">

                      <tr>
                          <td>Тип инсталация: &nbsp; @{{type}} </td>
                          <td>Табло №: @{{equip_value}}</td>
                      </tr>
                      <tr>
                          <td>Проверен от: @{{inspector}} на @{{date_of_last_check}}</td>
                          <td>Статус: @{{status}}</td>
                      </tr>
                      <tr>
                          <td>Бележки:</td>
                          <td>@{{notes}}</td>
                      </tr>

                  </table>
              </script>
