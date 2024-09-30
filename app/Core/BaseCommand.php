<?php

namespace App\Core;

class BaseCommand
{
    public static function calculateIpv6End($startIp, $prefixLength)
    {
        $startBinary = unpack('a16', $startIp)[1];
        if ($prefixLength < 0 || $prefixLength > 128) {
            throw new \InvalidArgumentException('Invalid IPv6 prefix length: ' . $prefixLength);
        }
        $startHex = bin2hex($startBinary);
        $bitsToSet = 128 - $prefixLength;
        $endHex = $startHex;

        for ($i = 0; $i < $bitsToSet; $i++) {
            $bitPosition = 127 - $i;
            $nibblePosition = (int) ($bitPosition / 4);
            $bitOffset = $bitPosition % 4;
            $currentNibble = hexdec($endHex[$nibblePosition]);
            $endNibble = $currentNibble | (1 << $bitOffset);
            $endHex[$nibblePosition] = dechex($endNibble);
        }

        return hex2bin($endHex);
    }

    /**
     * Convert IPv6 prefix to start and end addresses.
     *
     * @param string $network Network address
     * @param int $prefixLength Prefix length
     * @return array Start and end addresses
     */
    public static function ipv6PrefixToRange($network, $prefixLength)
    {
        // Convert the network address to binary
        $networkBinary = inet_pton($network);

        // Calculate the number of bits for the prefix
        $maskLength = 128 - (int) $prefixLength;

        // Create a mask of the appropriate length
        $mask = str_repeat(chr(0xFF), (int) ($prefixLength / 8)) . str_repeat(chr(0), (int) (16 - (int) ($prefixLength / 8)));
        $networkBinary = $networkBinary & $mask;

        // Calculate the end address
        $broadcastBinary = $networkBinary | str_repeat(chr(0xFF), 16 - (int) ($prefixLength / 8)) . str_repeat(chr(0), (int) ($prefixLength / 8));

        return [
            'start_ip' => inet_ntop($networkBinary),
            'end_ip' => inet_ntop($broadcastBinary)
        ];
    }
}
