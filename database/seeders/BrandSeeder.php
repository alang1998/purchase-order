<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Guesser\Name;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert([
            [
                "brand_code" => "ACAP",
                "name" => "AQUA PROOF",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AGD",
                "name" => "AGENDA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AGDP",
                "name" => "DEMPUL ALFA GLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AGTH",
                "name" => "ALFA GLOSS THINER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AM",
                "name" => "ADIWISESA MANDIRI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AOAT",
                "name" => "ALTEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AOIH",
                "name" => "INDIAN HEAD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ATLK",
                "name" => "LENKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVAN",
                "name" => "AVIAN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVAR",
                "name" => "ARIES",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVAT",
                "name" => "AVITEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVBM",
                "name" => "BEL MAS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVDJ",
                "name" => "DJARUM",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVHM",
                "name" => "AVIAN HAMMERTONE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVIP",
                "name" => "AVIAN VIP REMOVER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVND",
                "name" => "NO DROP",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVSYNBS",
                "name" => "AVIAN SYNTETIC BASE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVTHIN",
                "name" => "AVIAN THINNER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVYK",
                "name" => "AVIAN YOKO",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "AVZINC",
                "name" => "AVIAN ZINC CHROMATE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BALL",
                "name" => "BINA ADIDAYA LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BAPT",
                "name" => "PENTA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BASG",
                "name" => "SUPER GLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BDL",
                "name" => "BODELAC",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BL",
                "name" => "BELKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOAG",
                "name" => "BELAZO-AGE ACRYLIC GLOSS ENAMEL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOAL",
                "name" => "BELAZO ALKALI SEALER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOCLI",
                "name" => "BELAZO CLIMAGARD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOGNT",
                "name" => "BELAZO GRANITEUR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOKZD",
                "name" => "BELAZO KIDZ DREAM",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOMAX",
                "name" => "BELAZO MAXIMA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZORP",
                "name" => "BELAZO ROOF PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOSB",
                "name" => "BELAZO STONABID",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZOWS",
                "name" => "BELAZO WOOD STAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "BLZSP",
                "name" => "BELAZO STONAPLAS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "COBRA",
                "name" => "COBRA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "CTG",
                "name" => "CATYLAC GLOW",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "CTGL",
                "name" => "CATYLAC GLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "CTLL",
                "name" => "CATYLAC LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "CTTD",
                "name" => "CATYLAC BY DULUX TEMBOK",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DCF",
                "name" => "DECOFRESH",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DCLT",
                "name" => "DECOLITH",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLALK",
                "name" => "DULUX ALKALI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLAMB",
                "name" => "DULUX AMBIAN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLAQS",
                "name" => "DULUX AQUASHIELD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLEC",
                "name" => "DULUX EASY CLEAN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLLL",
                "name" => "DULUX LAIN LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLPG",
                "name" => "DULUX PEARL GLO",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLPT",
                "name" => "DULUX PENTALITE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLRP",
                "name" => "DULUX ROOF PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLVG",
                "name" => "DULUX V-GLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLWF",
                "name" => "DULUX WALLFILLER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLWM",
                "name" => "DULUX WEATHERSHIELD POWERFLAX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLWP",
                "name" => "DULUX WEATHERSHIELD (PRO)",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLWS",
                "name" => "DULUX WEATHERSHIEL GLOOS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DLWSF",
                "name" => "DULUX WEATHERSHIELD FLASH",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DMDX",
                "name" => "DAMDEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNA",
                "name" => "DANALAC",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNB",
                "name" => "DANABRITE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNC",
                "name" => "DANACRYL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNG",
                "name" => "DANAGLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNLL",
                "name" => "DANA LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNPN",
                "name" => "PINOGUARD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNS",
                "name" => "DANASHIELD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DNTP",
                "name" => "TOP COLOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "DSL",
                "name" => "SIKALASTIC DECKSEAL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "EST",
                "name" => "ESTIMA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "GTFT",
                "name" => "F-TALIT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "GTKD",
                "name" => "KARDIAC",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "GTLL",
                "name" => "KANSAI LAIN2",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "GTMC",
                "name" => "MARINE COATING KANSAI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "GTPP",
                "name" => "PROPERTY",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ICMX",
                "name" => "MAXILITE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCALK",
                "name" => "INDACO  ENVI ALKALI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCEAF",
                "name" => "INDACO  ENVI ANTI FOULING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCED",
                "name" => "INDACO  ENVIALKYD ECO DOFF",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCEV",
                "name" => "INDACO ENVI WALLPAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCEVEX",
                "name" => "INDACO ENVI EXTERIOR WALLPAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCEVL",
                "name" => "INDACO ENVIALKYD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCHS",
                "name" => "INDACO HOT SEAL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCMDCW",
                "name" => "INDACO MODACON WATERPROOFING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCNSX",
                "name" => "INDACO NUSATEX MENI KAYU",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCNSXK",
                "name" => "INDACO NUSATEX ANTI KARAT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCNSXP",
                "name" => "INDACO NUSATEX CAT PAVING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCPE",
                "name" => "INDACO ENVIALKYD PRIME ECO",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCRP",
                "name" => "INDACO  ENVI ROOF PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCTN",
                "name" => "INDACO THINER B ENVI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCTSL",
                "name" => "INDACO TOPSEAL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCWF",
                "name" => "INDACO  ENVI WALL PUTTY",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IDCZNP",
                "name" => "INDACO ENVI ZINC PHOSPATE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IMAL",
                "name" => "IMPRA AQUA LAQUER & ASS (AQUA SANDING)",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IMLL",
                "name" => "IMPRA LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IMML",
                "name" => "IMPRA  MELAMIN & MSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IMNC",
                "name" => "IMPRA NC (NITRO CELLULOSE) & SS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IMWF",
                "name" => "IMPRA WOOD FILLER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "IMWS",
                "name" => "IMPRA WOODSTAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JST",
                "name" => "JAYA SENTOSA THINER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTC",
                "name" => "JOTUN COSTAL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTGD",
                "name" => "GARDEX JOTUN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTLL",
                "name" => "JOTUN LAIN LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTMC",
                "name" => "MARINE COATING JOTUN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTMJ",
                "name" => "MAJESTIC JOTUN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTP",
                "name" => "JOTAPLAST",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTSH",
                "name" => "JOTA SHIELD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "JTSHE",
                "name" => "JOTASHIELD EXTREME",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "KCLL",
                "name" => "KCA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "KTFIN",
                "name" => "KEM-TONE FLAT INTERIOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "KTLL",
                "name" => "KEM-TONE LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "KTSEX",
                "name" => "KEM-TONE SATIN EXTERIOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "KTSIN",
                "name" => "KEM-TONE SATIN INTERIOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "KTSP",
                "name" => "KEM-TONE SPECTRUM",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "LB",
                "name" => "LABA-LABA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MLML",
                "name" => "MILAN MILAMIN & MSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MLS",
                "name" => "MILESI COATING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MLWF",
                "name" => "MILAN WOODFILLER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MLWS",
                "name" => "MILAN WOODSTAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MMMW",
                "name" => "MAWAR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MMRJ",
                "name" => "RAJAWALI MIKATASA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MMTK",
                "name" => "TAKA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MRP",
                "name" => "MITRA RAJAWALI PERKASA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWAG",
                "name" => "MOWILEX ACRYLIC GLOSS ENAMEL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWCD",
                "name" => "CENDANA MOWILEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWEM",
                "name" => "MOWILEX EMULSION",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWET",
                "name" => "MOWILEX ELASTOMERIC",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWLL",
                "name" => "MOWILEX LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWP",
                "name" => "MOWILEX WATERPROFING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWPC",
                "name" => "MOWILEX PRECOAT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWRP",
                "name" => "MOWILEX ROOF PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWVS",
                "name" => "MOWILEX VINYL SILK",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWWC",
                "name" => "MOWILEX WEATHER COAT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWWF",
                "name" => "MOWILEX WOOD FILLER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "MWWS",
                "name" => "MOWILEX WOOD STAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPELS",
                "name" => "NIPPON ELASTEX WATERPROOF",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPKMX",
                "name" => "KIMEX NIPPON",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPLL",
                "name" => "NIPPON LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPMC",
                "name" => "NIPPON MARINE COATING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPNP",
                "name" => "NIPPE 2000",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPPL",
                "name" => "PLATONE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPQLUC",
                "name" => "Q-LUC",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPRL",
                "name" => "NIPPON ROAD LINE PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPS",
                "name" => "NIPPON SPOTLESS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPT",
                "name" => "NEPTUNE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPVN",
                "name" => "VINILEX NIPPON",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NPZC",
                "name" => "NIPPON ZINCROMATE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NSIM",
                "name" => "IMPALA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NSTN",
                "name" => "NISSAN THINNER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "NVSE",
                "name" => "NIPPON VINILEX SUPER EXTERIOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "OCGP",
                "name" => "OCEAN GLOSS PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "OCL",
                "name" => "OCEAN LUX ACRYLIC EMULSION PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "OCRP",
                "name" => "OCEAN ROOF PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PCFN",
                "name" => "FINATEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PCMT",
                "name" => "METROLITE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PCWB",
                "name" => "PALADIN CLEAR WHITE BOARD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PLALK",
                "name" => "PALADIN ALKALI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PLDN(G)",
                "name" => "PALADIN GOLD",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PLDN(V)",
                "name" => "PALADIN SILVER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PLGRF",
                "name" => "GRAFFITI PROOF",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PLLKR",
                "name" => "LAKEROK",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRDC",
                "name" => "DECORCRYL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRDR",
                "name" => "PROPAN DECOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRDRC",
                "name" => "PROPAN DUROGLOSS RUBBING COMPOUND",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRDRG",
                "name" => "PROPAN DUROGLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRECO",
                "name" => "ECO EMULSION",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRFBK",
                "name" => "PROPAN FIBERKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRFM",
                "name" => "FURNICOTE MELAMINE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRLL",
                "name" => "PROPAN LAIN-LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRMTK",
                "name" => "PROPAN METALKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRPCRC",
                "name" => "PROPAN PCR CLEAR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRPRLC",
                "name" => "PROPAN PROLAC MARINE COATING",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRPT",
                "name" => "PROPAN PRIMTOP",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRPU",
                "name" => "PROPAN PU",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRRMV",
                "name" => "PROPAN PAINT REMOVER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRRX",
                "name" => "ROST X",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRSC",
                "name" => "PROPAN STONE CARE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRSENG",
                "name" => "PROPAN SENGKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRSK",
                "name" => "PROPAN STONKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRSS",
                "name" => "SICOSOL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRSYN",
                "name" => "PROPAN SYNTHETIC",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRTHN",
                "name" => "PROPAN THINNER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRTN",
                "name" => "TENNOKOTE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRUNCZ",
                "name" => "PROPAN UNI COLOR ZINCCHROMATE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRUNG",
                "name" => "PROPAN UNI NC GLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRUP",
                "name" => "ULTRA PROOF PROPAN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PRWS",
                "name" => "PROPAN WOODSTAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "PYRE",
                "name" => "POLYFLOOR EPOXY",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "RSAR",
                "name" => "ARCA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "RSSX",
                "name" => "SANLEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "SILON",
                "name" => "SIL'ON",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "SPEEDY",
                "name" => "SPEEDY THINNER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "TJAS",
                "name" => "ACCLAUSE SUPER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "TJPB",
                "name" => "POLIBEST",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "TJPR",
                "name" => "PARAGON",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "TJTH",
                "name" => "TUNGGAL DJAJA THINER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "TJV-TEX",
                "name" => "V-TEX",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ULDL",
                "name" => "DECK LAZUR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ULLL",
                "name" => "ULTRAN LAIN LAIN",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ULLZ",
                "name" => "ULTRAN LAZUR (EL,DL)",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ULP1",
                "name" => "ULTRAN PO1",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ULP3",
                "name" => "ULTRAN PO3",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "ULUS",
                "name" => "ULTRAN USE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "UNV",
                "name" => "THINER UNIVERSAL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "VRC",
                "name" => "VIRCAN TEKSTUR PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WALK",
                "name" => "WELDON ALKALI SEALER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WGIPSI",
                "name" => "GIPSI",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WLDN",
                "name" => "WELDON WALLPAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WLPLRCT",
                "name" => "WELDON PILLAR WALLPAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WLPR",
                "name" => "WELDON WATERPROFING(WELPROOF)",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WLS",
                "name" => "WELSTONE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WPLR",
                "name" => "PILLAR PLAMUR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WPR",
                "name" => "WELDON PRIMER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WRP",
                "name" => "WELDON ROOF PAINT",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WWGLS",
                "name" => "WELDON WIIGLOSS",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WWGZP",
                "name" => "WELDON WIIGLOSS ZINCPHOSPATE",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "WX",
                "name" => "WELDON EXTERIOR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "XXAFD",
                "name" => "AFDUNER",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "XXPTO",
                "name" => "POHON TEAK OIL",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "XXSIKA",
                "name" => "SIKA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "XXSR",
                "name" => "SAKURA",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "XXSV",
                "name" => "SEIV",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ],
            [
                "brand_code" => "XXTR",
                "name" => "TARTAR",
                "created_at" => Carbon::now()->format("Y-m-d H:i:s"),
                "updated_at" => Carbon::now()->format("Y-m-d H:i:s")
            ]
        ]);
    }
}
