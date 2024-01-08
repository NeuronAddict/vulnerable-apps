from flask import Flask
from flask_cors import CORS

app = Flask(__name__)
CORS(app)  # This will enable CORS for all routes

@app.route('/')
def hello_world():
    return 'the secret password is : oquohs1aig2aiW7xaeLai8cei'

if __name__ == '__main__':
    app.run()