<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Password\ExportRequest;

class ExportController extends Controller
{
    //
    public function export(ExportRequest $request)
    {
        // FileName
        $fileName = 'pass_'.date('Ymd').'.csv';
        // Header
        $head = ['ID', 'WebSite', 'Mail', 'Account', 'Password', 'Others'];
        // Get Data
        $passwords = $request->get_allData();
        // Open File
        $fp = fopen($fileName, 'w');
        // Encoding
        mb_convert_variables('SJIS', 'UTF-8', $head);
        // Write Collumn
        fputcsv($fp, $head);
        // Write Data
        foreach($passwords as $data)
        {
            $rowData = [$data['id'], $data['site'], $data['maddr'], $data['account'], $data['pass'], $data['bikou']];
            mb_convert_variables('SJIS', 'UTF-8', $rowData);
            fputcsv($fp, $rowData);
        }
        // Close
        fclose($fp);
        // HTTP Header
        header("Content-Type:application/octet-stream");
        header("Content-Length:".filesize($fileName));
        header("Content-Disposition: attachment; filename=".$fileName);
        readfile($fileName);

        return redirect()->route('password.index')->with('feedback.success', "Exported!!");      
    }       
}
