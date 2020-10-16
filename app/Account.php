<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
use Illuminate\Http\Request;

class Account extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
		'firstname',
		'middlename',
		'lastname',
		'city',
		'state',
		'country',
		'email',
		'phone_number',
        'account_number',
		'opening',
        'picture',
        'balance',
        'card_options',
    ];  

    protected $dates = [
        'opening'
    ];


    public function creditcard()
    {
        # code...
        return $this->hasOne(CreditCard::class);
    } 


    public function security_questions()
    {
        # code...
        return $this->hasMany(SecurityQuestion::class);
    } 


    public function transactions()
    {
        # code...
        return $this->hasMany(Transaction::class, 'account_id');
    }  


    public function card_activities()
    {
        # code...
        return $this->hasMany(CardActivity::class, 'account_id');
    } 

    public function generateTransactions($transactionCount, $transaction_start, $transaction_stop)
    {
        # code...

        $transactions = [];

        $faker = Faker::create();

        do{
            $account_num = $faker->bankAccountNumber;

            $max_account = 10;

            $account_num = strlen($account_num) < $max_account ? str_repeat(0, $max_account - strlen($account_num)) . $account_num : $account_num;

            $type = $faker->randomElement(['Credit', 'Debit']);

            $email = null;

            if ($type == 'Debit') {
                # code...
                $email = $faker->randomElement([$faker->email, $faker->freeEmail, $faker->companyEmail]);
                
            }
            
            $year = rand($transaction_start[0], $transaction_stop[0]);
            $month = rand($transaction_start[1], $transaction_stop[1]);
            $day = rand($transaction_start[2], $transaction_stop[2]);
            $transaction_date = Carbon::create($year, $month, $day);

            $transaction = [
                //
                'amount' => round($faker->numberBetween(99.9, 39999.9), 2),
                'reference' => strtoupper(str_shuffle(uniqid())),
                'type' => $type,
                'bank_name' => $faker->randomElement($this->banks()),
                'account_number' => $account_num,
                'account_name' => $faker->randomElement([$faker->name, $faker->bs, $faker->company]),
                'swift_code' => $faker->swiftBicNumber,
                'date' => $transaction_date,

                'email' => $email,
                'country' => $faker->country,
            ];

            array_push($transactions, $transaction);
        } while (count($transactions) <= $transactionCount);

        $this->transactions()->createMany($transactions);

        return $transactions;
    }


    public function generateCard($country)
    {
        # code...

        $faker = Faker::create();

        $i = 0;
        $card = mt_rand(1,9);
        do {
            $card .= mt_rand(0, 9);
        } while(++$i < 11);

        $card = $this->creditcard()->create([
            'card_number' => '5191' . $card,
            'expiry' => $faker->creditCardExpirationDateString,
            'cvc' => $faker->numberBetween(100, 999),
            'name' => $this->firstname . ' ' . $this->lastname
        ]);

        $transactions = [];

        $faker = Faker::create();

        do{

            $transaction = [
                //
                'amount' => round($faker->numberBetween(99, 1999), 2),
                'date' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = null),
                'country' => $country,
            ];

            array_push($transactions, $transaction);
        }while (count($transactions) <= 50);

        $this->card_activities()->createMany($transactions);

        return $card;
    }

    public function banks()
    {
        # code...
        return [
            "ABN AMRO",
            "Allahabad Bank",
            "Allen & Company",
            "Bank of America Merrill Lynch (BAML)",
            "Barclays Capital",
            "BB&T",
            "BBY Ltd.",
            "Berkery, Noyes & Co.",
            "BG Capital",
            "Blackstone",
            "BMO Capital Markets",
            "BNP Paribas",
            "Cantor Fitzgerald",
            "Capstone Partners",
            "Centerview Partners",
            "China International Capital Corporation",
            "CIBC World Markets",
            "Citi",
            "CITIC Securities International",
            "CLSA",
            "Commerzbank",
            "Corporate Finance Associates",
            "Cowen",
            "Credit Agricole CIB",
            "Credit Suisse",
            "CSG Partners",
            "Daewoo Securities",
            "Deutsche Bank",
            "Duff & Phelps",
            "Europa Partners",
            "Evercore Partners",
            "Financo",
            "Gleacher & Company",
            "Goldman Sachs",
            "Greenhill & Co.",
            "Guggenheim Partners",
            "Guosen Partners",
            "Houlihan Lokey",
            "HSBC Holdings PLC",
            "Imperial Capital",
            "ICBC (China)",
            "ICICI Bank",
            "Indian Bank",
            "J.P. Morgan",
            "Jefferies & Co.",
            "Keefe, Bruyette, & Woods",
            "KeyCorp (KeyBanc Capital Markets)",
            "Ladenburg Thalmann",
            "Lancaster Pollard",
            "Lazard",
            "Lincoln International",
            "Macquarie Group",
            "Maple Capital Advisors",
            "Marathon Capital",
            "McColl Partners",
            "Mediobanca",
            "Miller Buckfire & Co.",
            "Mitsubishi UFJ Financial Group",
            "Mizuho Financial Group",
            "Moelis & Company",
            "Montgomery  & Co.",
            "Morgan Keegan & Co.",
            "Morgan Stanley",
            "Needham & Co.",
            "NBF (National Bank Financial)",
            "Nomura Holdings",
            "Oppenheimer & Co.",
            "Panmure Gordon",
            "Perella Weinberg Partners",
            "Piper Jaffray",
            "PNC Financial Services (Harris Williams & Co.",
            "Punjab National Bank",
            "Raymond James",
            "RBC Capital Markets",
            "RBS",
            "Robert W. Baird",
            "Roth Capital Partners",
            "Rothschild",
            "Sagent Advisors",
            "Sandler O’Neill Partners",
            "SBI Capital Markets (State Bank of India)",
            "Scotiabank",
            "Societe Generale",
            "Sonenshine Partners",
            "Stephens, Inc.",
            "Stifel Financial",
            "Sucsy, Fischer & Company",
            "Sumitomo Mitsui Financial Group",
            "SunTrust (Robinson Humphrey)",
            "Syndicate Bank",
            "TD Securities",
            "United bank of India",
            "UBS",
            "Vermillion Partners",
            "Vijaya Bank",
            "Wedbush Securities",
            "Wells Fargo & Co.",
            "William Blair & Company",
            "WR Hambrecht & Co.",
            "Yes Bank",
            "Industrial & Commercial Bank of China",
            "China Construction Bank Corp",
            "Agricultural Bank of China",
            "Bank of China",
            "Mitsubishi UFJ Financial Group",
            "JPMorgan Chase & Co",
            "HSBC Holdings",
            "BNP Paribas",
            "Bank of America",
            "China Development Bank",
            "Credit Agricole Group",
            "Wells Fargo",
            "Japan Post Bank",
            "Mizuho Financial Group",
            "Sumitomo Mitsui Financial Group",
            "Citigroup Inc",
            "Deutsche Bank",
            "Banco Santander",
            "Barclays PLC",
            "Societe Generale",
            "Groupe BPCE",
            "Bank of Communications",
            "Postal Savings Bank of China",
            "Lloyds Banking Group",
            "Royal Bank of Canada",
            "ING Groep NV",
            "Toronto-Dominion Bank",
            "Norinchukin Bank",
            "UniCredit S.p.A.",
            "Royal Bank of Scotland Group",
            "Industrial Bank Co. Ltd",
            "China Merchants Bank",
            "Intesa Sanpaolo",
            "Credit Mutuel",
            "UBS Group AG",
            "Shanghai Pudong Development Bank",
            "Goldman Sachs Group",
            "Agricultural Development Bank of China",
            "China Minsheng Banking Corp",
            "Morgan Stanley",
            "China CITIC Bank Corp",
            "BBVA",
            "Credit Suisse Group",
            "Bank of Nova Scotia",
            "Commonwealth Bank of Australia",
            "Rabobank Group",
            "Australia & New Zealand Banking Group",
            "Nordea",
            "European Investment Bank",
            "Westpac Banking Corp",
            "Standard Chartered Plc",
            "National Australia Bank",
            "China Everbright Bank",
            "DZ Bank AG",
            "Bank of Montreal",
            "Sumitomo Mitsui Trust Holdings",
            "Danske Bank",
            "KfW Group",
            "Commerzbank",
            "State Bank of India",
            "Cassa Depositi e Prestiti (CDP)",
            "The Export-Import Bank of China (Eximbank)",
            "Canadian Imperial Bank of Commerce",
            "Ping An Bank",
            "ABN AMRO Group NV",
            "Sberbank of Russia",
            "U.S. Bancorp",
            "CaixaBank",
            "Itau Unibanco Holding SA",
            "Resona Holdings",
            "Banco do Brasil SA",
            "KB Financial Group",
            "Shinhan Financial Group",
            "Nomura Holdings",
            "DBS Group Holdings",
            "Caixa Economica Federal",
            "PNC Financial Services Group",
            "Hua Xia Bank",
            "Bank of New York Mellon Corp",
            "Shinkin Central Bank (SCB)",
            "Capital One Financial Corporation",
            "Banco Bradesco SA",
            "KBC Group NV",
            "Bank of Beijing",
            "Oversea-Chinese Banking Corp (OCBC)",
            "Hana Financial Group",
            "Svenska Handelsbanken",
            "NongHyup Financial Group",
            "Woori Bank",
            "DnB ASA",
            "China Guangfa Bank (CGB)",
            "Skandinaviska Enskilda Banken",
            "Nationwide Building Society",
            "Cathay Financial Holding",
            "Landesbank Baden-Wurttemberg",
            "La Banque Postale",
            "Bank of Shanghai",
            "Swedbank",
            "United Overseas Bank (UOB)",
            "Bank of Jiangsu",
            "Banco Sabadell",
            "Bayerische Landesbank",
            "Erste Group Bank AG",
            "Brazilian Development Bank (BNDES)",
            "Industrial Bank of Korea",
            "Bankia",
            "Charles Schwab Corp",
            "Dexia",
            "State Street Corp",
            "Raiffeisen Schweiz",
            "Nykredit Group",
            "Fubon Financial Holding",
            "VTB Bank",
            "China ZheShang Bank (CZBank)",
            "BB&T Corporation",
            "Qatar National Bank",
            "National Bank of Canada",
            "Suntrust Banks",
            "Korea Development Bank",
            "Belfius"
        ];
    }
}
