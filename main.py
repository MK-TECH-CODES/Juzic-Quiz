from flask import *
app=Flask(__name__)
opa="Lightning mcqueen"
@app.route("/")
def hii():
    return render_template("home.html",choice1=opa)
if __name__=="__main__":
       app.run(debug=True)
    