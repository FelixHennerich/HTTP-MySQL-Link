/**
 * Function for generating a 128Bit Unique ID (UUID)
 *
 * @returns {string} -> 128Bit UUID
 */
function generate128BitUUID() {
    const randomBits = generateRandomBits(128);
    return formatBitsAsUUID(randomBits);
}

/**
 * Generating random bits for UUID
 *
 * @param {number} bits -> length of UUID
 * @returns {Uint8Array} -> Array of randomized Bytes
 */
function generateRandomBits(bits) {
    const byteArraySize = Math.ceil(bits / 8);
    const randomBytes = new Uint8Array(byteArraySize);

    for (let i = 0; i < byteArraySize; i++) {
        randomBytes[i] = Math.floor(Math.random() * 256);
    }
    
    // Clear the unused bits in the last byte
    randomBytes[0] &= 0xFF << (8 - (bits % 8));

    return randomBytes;
}

/**
 * Formatting the randomized Bytes to UUID
 *
 * @param {Uint8Array} bits -> Bytearray with randomized Bytes
 * @returns {string} -> finished UUID
 */
function formatBitsAsUUID(bits) {
    const sb = [];
    for (const byte of bits) {
        const hex = byte.toString(16).padStart(2, '0');
        sb.push(hex);
    }
    return sb.join('');
}
