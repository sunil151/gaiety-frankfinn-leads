<?php namespace App\Controllers;

use App\Models\Home_model;
use CodeIgniter\Controller;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Home extends Controller
{

    public function index()
    {
        return view('excel_upload_form'); // Create a view for the upload form
    }

    public function upload()
    {
        $Home_model = new Home_model();

        $validationRules = [
            'excel_file' => [
                'uploaded[excel_file]',
                'mime_in[excel_file,application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet]',
                'max_size[excel_file,2048]', // Max 2MB
            ],
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        $file = $this->request->getFile('excel_file');
        if ($file->isValid() && !$file->hasMoved()) {
            
            try {
                
                $path = $_FILES['excel_file']['tmp_name'];				
                $spreadsheet = IOFactory::load($path);
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

                $firstRow = true;
				$hasData = false;
            	foreach ($sheetData as $row) {
					// Skip header row
					if ($firstRow) {
						$firstRow = false;
						continue;
					}

					// Check if the row is completely empty
					$allEmpty = true;
					foreach ($row as $cellValue) {
						if (trim($cellValue) !== '') {
							$allEmpty = false;
							break;
						}
					}

					// If all cells are empty, skip processing this row
					if ($allEmpty) {
						continue;
					}

					// Mark that at least one valid row exists
					$hasData = true;
					
                    $data = [						
						'full_name'  => $row['A'],
						'mobile'  => $row['B'],
						'email' => $row['C'],
						'dob' => ($row['D']) ? date("Y-m-d", strtotime($row['D'])) : '',
						'centerId' => $row['E'],
						'qualificationId' => $row['F'],
						'campaign_source' => $row['G'],
						'utm_medium' => $row['H'],
						'utm_campaign' => $row['I'],
						'utm_term' => $row['J'],
						'utm_content' => $row['K']						                       
					];
                    
                    $insert_array = $data;

                    $api_response = $this->api_request($data);
                    $result = json_decode($api_response, true);
                    
                    if (isset($result['status']) && $result['status'] === true) {
                        $insert_array["api_status"] = "success";
                        $insert_array["api_message"] = $result['message'];
                    } else {
                        $insert_array["api_status"] = "fail";
                        $insert_array["api_message"] = $result['message'];
                    }
                    
                    $insert_array["gad_source"] = $row['L'];
                    $insert_array["gclid"] = $row['M'];
                    $insert_array["gbraid"] = $row['N'];
                    // print_r($insert_array);

					$Home_model->save_lead_data($insert_array);
				}

                return redirect()->back()->with('success', 'Excel file imported successfully.');

            } catch (\Exception $e) {
                echo "<pre>";
                print_r($e);
                exit;
                return redirect()->back()->with('error', 'Error reading Excel file: ' . $e->getMessage());
            }
        } else {
            return redirect()->back()->with('error', 'File upload failed.');
        }
    }

    function api_request( $data ) {
        $url = "https://www.frankfinn.com/newleadLms";        
        $headers = [
            'Content-Type: application/json',
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        return $response = curl_exec($ch);
        curl_close($ch);
    }    

}