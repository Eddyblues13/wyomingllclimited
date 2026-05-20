<?php

namespace Database\Seeders;

use App\Models\CryptoDetail;
use Illuminate\Database\Seeder;

class CryptoDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cryptos = [
            [
                'name' => 'Bitcoin (BTC)',
                'symbol' => 'BTC',
                'network' => 'BTC',
                'deposit_address' => '1A1zP1eP5QGefi2DMPTfTL5SLmv7DivfNa',
                'icon_url' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'bg_color' => '#F7931A',
                'data_symbol' => 'btc',
            ],
            [
                'name' => 'Ethereum (ETH)',
                'symbol' => 'ETH',
                'network' => 'ERC20',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://assets.coingecko.com/coins/images/279/large/ethereum.png',
                'bg_color' => '#627EEA',
                'data_symbol' => 'erc20',
            ],
            [
                'name' => 'USDT (TRC20)',
                'symbol' => 'USDT',
                'network' => 'TRC20',
                'deposit_address' => 'TXC5wW64VpWJ6L9g4cE8fG9Uv5Q9HwXqgX',
                'icon_url' => 'https://assets.coingecko.com/coins/images/325/large/Tether-logo.png',
                'bg_color' => '#26A17B',
                'data_symbol' => 'trc20',
            ],
            [
                'name' => 'XLM',
                'symbol' => 'XLM',
                'network' => 'XLM',
                'deposit_address' => 'GAHK7EEG2WWHVKHAXD4THCXC3V5UXE2B4WUXCX3B5XEE4T6B',
                'icon_url' => 'https://assets.coingecko.com/coins/images/100/large/Stellar_symbol_black_RGB.png',
                'bg_color' => '#14B6E7',
                'data_symbol' => 'xlm',
            ],
            [
                'name' => 'XRP',
                'symbol' => 'XRP',
                'network' => 'XRP',
                'deposit_address' => 'rPVMhxAbt5sgmKBFRuJ58Aczj9G315xKVg',
                'icon_url' => 'https://assets.coingecko.com/coins/images/44/large/xrp.png',
                'bg_color' => '#23292F',
                'data_symbol' => 'xrp',
            ],
            [
                'name' => 'LTC',
                'symbol' => 'LTC',
                'network' => 'LTC',
                'deposit_address' => 'LRxn75p8UP5e5nB6kC9W6vC5wW6VpWJ6L9',
                'icon_url' => 'https://assets.coingecko.com/coins/images/2/large/litecoin.png',
                'bg_color' => '#BFBBBB',
                'data_symbol' => 'ltc',
            ],
            [
                'name' => 'DOGE',
                'symbol' => 'DOGE',
                'network' => 'DOGE',
                'deposit_address' => 'DF8jA64VpWJ6L9g4cE8fG9Uv5Q9HwXqgX',
                'icon_url' => 'https://assets.coingecko.com/coins/images/5/large/dogecoin.png',
                'bg_color' => '#C2A633',
                'data_symbol' => 'doge',
            ],
            [
                'name' => 'ICP',
                'symbol' => 'ICP',
                'network' => 'ICP',
                'deposit_address' => 'a8d5e5e6e7e8e9e0e1e2e3e4e5e6e7e8e9e0e1e2e3e4e5e6e7e8e9e0e1e2e3e4',
                'icon_url' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'bg_color' => '#666666',
                'data_symbol' => 'icp',
            ],
            [
                'name' => 'SHIBA(ethereum)',
                'symbol' => 'SHIB',
                'network' => 'ERC20',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'bg_color' => '#666666',
                'data_symbol' => 'erc20',
            ],
            [
                'name' => 'USDT(Ethereum)',
                'symbol' => 'USDT',
                'network' => 'ERC20',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://assets.coingecko.com/coins/images/325/large/Tether-logo.png',
                'bg_color' => '#26A17B',
                'data_symbol' => 'erc20',
            ],
            [
                'name' => 'BNB(Bnb smart chain)',
                'symbol' => 'BNB',
                'network' => 'BSC',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://assets.coingecko.com/coins/images/825/large/binance-coin-logo.png',
                'bg_color' => '#F3BA2F',
                'data_symbol' => 'bsc',
            ],
            [
                'name' => 'USDC(ethereum)',
                'symbol' => 'USDC',
                'network' => 'ERC20',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'bg_color' => '#666666',
                'data_symbol' => 'erc20',
            ],
            [
                'name' => 'USDC(TRC20)',
                'symbol' => 'USDC',
                'network' => 'TRC20',
                'deposit_address' => 'TXC5wW64VpWJ6L9g4cE8fG9Uv5Q9HwXqgX',
                'icon_url' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'bg_color' => '#666666',
                'data_symbol' => 'trc20',
            ],
            [
                'name' => 'TRX',
                'symbol' => 'TRX',
                'network' => 'TRON',
                'deposit_address' => 'TXC5wW64VpWJ6L9g4cE8fG9Uv5Q9HwXqgX',
                'icon_url' => 'https://coin-images.coingecko.com/coins/images/1094/large/tron-logo.png',
                'bg_color' => '#EB0029',
                'data_symbol' => 'tron',
            ],
            [
                'name' => 'solana',
                'symbol' => 'SOL',
                'network' => 'SOL',
                'deposit_address' => 'HN7cAB2WZ454KHAXD4THCXC3V5UXE2B4WUXCX3B5XEE',
                'icon_url' => 'https://assets.coingecko.com/coins/images/4128/large/coinmarketcap-solana-200.png',
                'bg_color' => '#9945FF',
                'data_symbol' => 'sol',
            ],
            [
                'name' => 'ADA',
                'symbol' => 'ADA',
                'network' => 'CARDANO',
                'deposit_address' => 'addr1q9d5e5e6e7e8e9e0e1e2e3e4e5e6e7e8e9e0e1e2e3e4e5e6e7e8e9e0e1e2e3e4',
                'icon_url' => 'https://assets.coingecko.com/coins/images/975/large/cardano.png',
                'bg_color' => '#0033AD',
                'data_symbol' => 'cardano',
            ],
            [
                'name' => 'Toshi',
                'symbol' => 'TOSHI',
                'network' => 'Base',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://coin-images.coingecko.com/coins/images/31126/large/Toshi_Logo_-_Circular.png',
                'bg_color' => '#F7931A',
                'data_symbol' => 'base',
            ],
            [
                'name' => 'Mog coin ',
                'symbol' => 'MOG',
                'network' => 'Base ',
                'deposit_address' => '0x71C7656EC7ab88b098defB751B7401B5f6d8976F',
                'icon_url' => 'https://assets.coingecko.com/coins/images/1/large/bitcoin.png',
                'bg_color' => '#666666',
                'data_symbol' => 'base ',
            ],
        ];

        foreach ($cryptos as $crypto) {
            CryptoDetail::updateOrCreate(
                ['name' => $crypto['name']],
                $crypto
            );
        }
    }
}
