<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiDokumentasiController extends Controller
{
    /**
     * Daftar layanan API yang tersedia
     *
     * @var array
     */
    protected $apiServices = [
        'bank' => [
            'name' => 'Pengecekan Rekening',
            'description' => 'Layanan untuk memverifikasi informasi rekening bank dan e-wallet',
            'endpoints' => [
                [
                    'method' => 'GET',
                    'url' => '/api/v1/bank-list',
                    'description' => 'Ambil daftar bank dan e-wallet yang tersedia',
                    'parameters' => [],
                    'response_example' => [
                        'success' => true,
                        'message' => 'List of all banks',
                        'data' => [
                            'banks' => [
                                [
                                    'value' => 'bca',
                                    'label' => 'Bank Central Asia'
                                ]
                            ],
                            'ewallets' => [
                                [
                                    'value' => 'gopay',
                                    'label' => 'GoPay'
                                ]
                            ]
                        ]
                    ],
                    'examples' => [
                        'curl' => 'curl https://cekrekening-api.belibayar.online/api/v1/bank-list',
                        'php' => '$response = Http::get("https://cekrekening-api.belibayar.online/api/v1/bank-list");'
                    ]
                ],
                [
                    'method' => 'POST',
                    'url' => '/api/v1/account-inquiry',
                    'description' => 'Periksa validitas rekening bank atau e-wallet',
                    'parameters' => [
                        'account_number' => [
                            'type' => 'string',
                            'required' => true,
                            'description' => 'Nomor rekening atau ID akun'
                        ],
                        'account_bank' => [
                            'type' => 'string',
                            'required' => true,
                            'description' => 'Kode bank atau e-wallet'
                        ]
                    ],
                    'response_example' => [
                        'success' => true,
                        'message' => 'Account found',
                        'data' => [
                            'account_number' => '0123456789',
                            'account_holder' => 'GOPAY Beli Bayar Online',
                            'account_bank' => 'gopay'
                        ]
                    ],
                    'examples' => [
                        'curl' => 'curl -X POST https://cekrekening-api.belibayar.online/api/v1/account-inquiry \
   -H "Content-Type: application/json" \
   -d \'{"account_number":"0123456789","account_bank":"gopay"}\'',
                        'php' => '$response = Http::post("https://cekrekening-api.belibayar.online/api/v1/account-inquiry", [
    "account_number" => "0123456789",
    "account_bank" => "gopay"
]);'
                    ]
                ]
            ],
            'external_apis' => [
                [
                    'name' => 'Beli Bayar Account Inquiry',
                    'url' => 'https://cekrekening-api.belibayar.online/api/v1/account-inquiry',
                    'description' => 'API untuk pengecekan rekening bank dan e-wallet'
                ]
            ],
            'ip_addresses' => [
                '103.xxx.xxx.xxx',  // Beli Bayar API IP
                '180.xxx.xxx.xxx'   // Backup IP
            ]
        ],
        'resi' => [
            'name' => 'Pelacakan Resi',
            'description' => 'Layanan untuk melacak status pengiriman paket',
            'endpoints' => [
                [
                    'method' => 'GET',
                    'url' => '/api/checkresi',
                    'description' => 'Lacak status pengiriman berdasarkan nomor resi',
                    'parameters' => [
                        'apikey' => [
                            'type' => 'string',
                            'required' => true,
                            'description' => 'API Key untuk autentikasi'
                        ],
                        'resi' => [
                            'type' => 'string',
                            'required' => true,
                            'description' => 'Nomor resi pengiriman'
                        ]
                    ],
                    'response_example' => [
                        'status' => 200,
                        'message' => 'success',
                        'result' => [
                            'resi' => '004423469590',
                            'courier' => 'sicepat',
                            'origin' => [
                                'name' => 'Josnackhome',
                                'address' => 'Kediri'
                            ],
                            'destination' => [
                                'name' => 'Angela Fransisca',
                                'address' => 'Tambaksari, KOTA SURABAYA'
                            ],
                            'history' => [
                                [
                                    'note' => 'Order has been confirmed. Locating nearest driver to pick up.',
                                    'time' => '2025-03-16 15:59'
                                ],
                                [
                                    'note' => 'Item has been picked and ready to be shipped.',
                                    'time' => '2025-03-17 14:25'
                                ],
                                [
                                    'note' => 'Paket telah di input (manifested) di Kediri [Kediri Ngasem FM]',
                                    'time' => '2025-03-17 16:42'
                                ],
                                [
                                    'note' => 'Paket keluar dari Kediri [Kediri Ngasem FM]',
                                    'time' => '2025-03-17 17:40'
                                ]
                            ]
                        ]
                    ],
                    'examples' => [
                        'curl' => 'curl "https://api.lolhuman.xyz/api/checkresi?apikey=67ecacbf055f585b28de9f6a&resi=004423469590"',
                        'php' => '$response = Http::get("https://api.lolhuman.xyz/api/checkresi", [
    "apikey" => "67ecacbf055f585b28de9f6a",
    "resi" => "004423469590"
]);'
                    ]
                ]
            ],
            'external_apis' => [
                [
                    'name' => 'LolHuman Resi Tracking',
                    'url' => 'https://api.lolhuman.xyz/api/checkresi',
                    'description' => 'API untuk melacak status pengiriman paket berbagai kurir'
                ]
            ],
            'ip_addresses' => [
                '103.xxx.xxx.xxx',  // LolHuman API IP
                '180.xxx.xxx.xxx'   // Backup IP
            ]
        ]
    ];

    /**
     * Tampilkan halaman dokumentasi API
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dokumentasi.api', [
            'apiServices' => $this->apiServices
        ]);
    }

    /**
     * Tampilkan detail dokumentasi untuk layanan spesifik
     *
     * @param string $serviceKey
     * @return \Illuminate\View\View
     */
    public function showServiceDetail($serviceKey)
    {
        $service = $this->apiServices[$serviceKey] ?? null;

        if (!$service) {
            abort(404, 'Layanan API tidak ditemukan');
        }

        return view('dokumentasi.api-detail', [
            'service' => $service
        ]);
    }

    /**
     * Ambil detail dokumentasi untuk layanan spesifik (API)
     *
     * @param string $service
     * @return \Illuminate\Http\JsonResponse
     */
    public function getServiceDetails($service)
    {
        $serviceDetails = $this->apiServices[$service] ?? null;

        if (!$serviceDetails) {
            return response()->json([
                'status' => 'error',
                'message' => 'Layanan API tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $serviceDetails
        ]);
    }
}