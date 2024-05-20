<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CSVData; // Ensure you have a User model
use DB;

class UserController extends Controller
{



    public function showUploadForm()
    {
        //it shows csv form to upload
        return view('upload');
    }


    /**
     * Handle the file upload and CSV data insertion.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function uploadCSV(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'csv_file' => 'required|mimes:csv,txt|max:2048', // CSV file with max size 2MB
        ]);

        // Check if a file is uploaded
        if ($request->hasFile('csv_file')) {
            $file = $request->file('csv_file');

            // Get file path
            $filePath = $file->getRealPath();

            // Open and read the CSV file
            $file = fopen($filePath, 'r');

            // Skip the header row
            $header = fgetcsv($file);

            // Initialize an empty array for data
            $csvData = [];

            // Read data from CSV file
            while ($row = fgetcsv($file)) {
                $csvData[] = [
                    'index' => $row[0],
                    'customer_id' => $row[1],
                    'first_name' => $row[2],
                    'last_name' => $row[3],
                    'company' => $row[4],
                    'city' => $row[5],
                    'country' => $row[6],
                    'phone_1' => $row[7],
                    'phone_2' => $row[8],
                    'email' => $row[9],
                    'subscription_date' => $row[10],
                    'website' => $row[11],
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }

            fclose($file);

            // Store CSV data into database
            if (!empty($csvData)) {
                CSVData::insert($csvData);
            }

            // Redirect to view the uploaded data
            return redirect()->route('uploaded.data')->with('success', 'CSV file imported successfully.');
        }

        // Redirect back with error message if file upload fails
        return redirect()->route('upload.form')->with('error', 'File upload failed. Please try again.');
    }

    public function showUploadedData()
    {
        //show uploaded data
        $csvData = CSVData::all();

        return view('index', compact('csvData'));
    }
}
