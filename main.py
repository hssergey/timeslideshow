from flask import Flask, render_template, send_from_directory
import glob


app = Flask(__name__)


@app.route("/")
def hello_world():
    images = glob.glob("images/*.*")
    return render_template('main.html', images = images)


@app.route("/images/<path:name>")
def download_file(name):
    return send_from_directory(
        "images", name, as_attachment = False
    )
