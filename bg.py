from rembg import remove
from PIL import Image
import io

# Load input image
input_path = 'H:\Project\Patel_Engineering_Rental_Equipment\patel_engineering_final\Screenshot 2025-07-10 103428.png'   # Replace with your image path
output_path = 'output2.png'  # Output will be in PNG to preserve transparency

with open(input_path, 'rb') as inp_file:
    input_data = inp_file.read()

# Remove background
output_data = remove(input_data)

# Save output image
with open(output_path, 'wb') as out_file:
    out_file.write(output_data)

print("Background removed and saved to", output_path)
