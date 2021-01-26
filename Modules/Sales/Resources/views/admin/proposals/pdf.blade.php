<!DOCTYPE html>
<html dir="rtl">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>body { font-family: DejaVu Sans, sans-serif; }</style>
    <title></title>
  </head>
  <body>
    <table class="table table-bordered">
    <thead>
      <tr>
        <td><b>Show Name</b></td>
        <td><b>Series</b></td>
        <td><b>Lead Actor</b></td>     
      </tr>
      </thead>
      <tbody>
      <tr>
        <td>
          {{$proposal->subject ?? ''}}
        </td>
        <td>
          {{$proposal->status ?? ''}}
        </td>
        <td>
          {{$proposal->id}}
        </td>
      </tr>
      </tbody>
    </table>
  </body>
</html>